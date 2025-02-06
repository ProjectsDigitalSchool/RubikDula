<?php
include('server/connection.php');

// Set default values
$page_no = 1;
$total_records_per_page = 8;
$total_no_of_pages = 1;
$offset = 0;
$category_filter = '';
$search_keyword = '';
$adjacents = 2; // Define $adjacents here or assign it a value before its first usage

// Add code to retrieve search keyword
$search_keyword = '';
if (isset($_POST['search_keyword'])) {
    $search_keyword = $_POST['search_keyword'];
}

if (isset($_POST['search'])) {
    $category = $_POST['category'];
    $price = $_POST['price'];

    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    }

    if ($category === 'Winter Fragrance') {
        $category_filter = 'Winter';
    } else if ($category === 'Summer Fragrance') {
        $category_filter = 'Summer';
    } else {
        $category_filter = '%' . $category . '%';
    }

    // Prepare the count query
    $count_query = "SELECT COUNT(*) As total_records FROM products WHERE product_category LIKE ? AND product_price <= ?";
    if (!empty($search_keyword)) {
        $count_query .= " AND product_name LIKE ?";
    }

    $stmt = $conn->prepare($count_query);
    if (!empty($search_keyword)) {
        $stmt->bind_param("sds", $category_filter, $price, $search_keyword);
    } else {
        $stmt->bind_param("sd", $category_filter, $price);
    }

    $stmt->execute();
    $stmt->bind_result($total_records);
    $stmt->store_result();
    $stmt->fetch();

    // Prepare the products retrieval query
    $products_query = "SELECT * FROM products WHERE product_category LIKE ? AND product_price <= ?";
    if (!empty($search_keyword)) {
        $products_query .= " AND product_name LIKE ?";
    }
    $products_query .= " LIMIT ?, ?";

    $stmt2 = $conn->prepare($products_query);
    if (!empty($search_keyword)) {
        $stmt2->bind_param("sdsii", $category_filter, $price, $search_keyword, $offset, $total_records_per_page);
    } else {
        $stmt2->bind_param("sdii", $category_filter, $price, $offset, $total_records_per_page);
    }

    $stmt2->execute();
    $products = $stmt2->get_result();
} else {
    if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
    $stmt1->execute();
    $stmt1->bind_result($total_records);
    $stmt1->store_result();
    $stmt1->fetch();

    $total_records_per_page = 8;

    $offset = ($page_no - 1) * $total_records_per_page;

    $previous_page = $page_no - 1;
    $next_page = $page_no + 1;

    $adjacents = 2;

    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    $stmt2 = $conn->prepare("SELECT * FROM products LIMIT ?, ?");
    $stmt2->bind_param("ii", $offset, $total_records_per_page);
    $stmt2->execute();
    $products = $stmt2->get_result();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            float: left;
            width: 30%;
            padding: 20px;
            background-color: #f9f9f9;
            margin-top: 200px;
        }

        .product-container {
            float: right;
            width: 70%;
            padding: 20px;
        }

        /* Custom styling for the price range */
        #customRange2 {
            width: 100%;
            height: 1.5rem;
            border-radius: 5px;
        }

        /* Custom track styling */
        #customRange2::-webkit-slider-runnable-track {
            width: 100%;
            height: 8px;
            cursor: pointer;
            animate: 0.2s;
            background: #007bff;
            border-radius: 5px;
        }

        /* Custom thumb (slider handle) styling */
        #customRange2::-webkit-slider-thumb {
            height: 20px;
            width: 20px;
            border-radius: 50%;
            background: #007bff;
            cursor: pointer;
            -webkit-appearance: none;
            margin-top: -8px;
        }

        /* Additional styling for the labels */
        .price-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            color: #555;
        }

        @media (max-width: 900px) {
            .form-container{
                display: none;
            }
            .product-container {
                width: 100%;
            }
            .product-container ul li svg {
                display: block;
            }
        }

        #filterCollapse {
            display: none;
        }

        .sidebarform-container{
            border-radius: 50px;
            position: fixed;
            margin-top: 180px;
            right: 0;
            height: 60vh;
            width: 250px;
            z-index: 999;
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            box-shadow: -10px 0 10px rgba(0, 0, 0, 0.1);
            display: none;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
        }

        
        .sidebarform-container ul {
        list-style-type: none;
        padding-left: 0;
    }

    /* Make the burger icon responsive */
    .sidebarform-container ul li svg {
        fill: #000; /* Adjust fill color as needed */
        cursor: pointer;
        display: block;
        margin-left: 20vh; /* Adjust margin as needed */
    }

    .product-container ul {
        list-style-type: none;
        padding-left: 0;
    }

    /* Make the burger icon responsive */
    .product-container ul li svg {
        fill: #000; /* Adjust fill color as needed */
        cursor: pointer;
        display: none;
        margin-left: 40vh; /* Adjust margin as needed */
    }

    @media (max-width: 900px) {
        .form-container{
            display: none;
        }
        .product-container {
            width: 100%;
        }
        .product-container ul li svg {
            display: block;
            
        }
    }
    .fixed-footer{
        height:250vh
    }
@media(max-width: 400px){
    .fixed-footer{
        height:350vh
    }
}
    </style>
</head>
<body>

<?php include('header.php'); ?>


<div class="fixed-footer"><div class="sidebarform-container">
    <form action="shop.php" method="POST">
        <div class="row max-auto container">
            <div>
                <h4 class="mt-5">Filter Options</h1>
                <hr class="mx-auto">
                <ul>
                    <li onclick=hideSidebar()><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg></li>
                </ul>
            </div>

            <div class="row max-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Category</p>
                    <div class="form-check">
                        <input class="form-check-input" value="Summer Fragrance" type="radio" name="category" id="category_one">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Summer Fragrance
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Winter Fragrance" type="radio" name="category" id="category_two">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Winter Fragrance
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mx-auto container mt-5">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Price</p>
                    <input type="range" class="form-range w-50" name="price" value="50" min="1" max="500" id="customRange2">
                    <div class="w-50">
                        <span style="float: left;">$1</span>
                        <span style="float: right;" id="priceValue">$500</span>
                    </div>
                </div>
            </div>

            <div class="form-group my-3 mx-3">
                <input type="submit" name="search" value="Search" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>

<div class="form-container">
    <form action="shop.php" method="POST">
        <div class="row max-auto container">
            <div>
                <h4>Filter Options</h1>
                <hr class="mx-auto">
            </div>

            <div class="row max-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Category</p>
                    <div class="form-check">
                        <input class="form-check-input" value="Summer Fragrance" type="radio" name="category" id="category_one">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Summer Fragrance
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="Winter Fragrance" type="radio" name="category" id="category_two">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Winter Fragrance
                        </label>
                    </div>
                </div>
            </div>

            <div class="row mx-auto container mt-5">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p>Price</p>
                    <input type="range" class="form-range w-50" name="price" value="50" min="1" max="500" id="customRange2">
                    <div class="w-50">
                        <span style="float: left;">$1</span>
                        <span style="float: right;" id="priceValue">$500</span>
                    </div>
                </div>
            </div>

            <div class="form-group my-3 mx-3">
                <input type="submit" name="search" value="Search" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>


<div class="product-container">
    <section id="featured" class="my-5 py-5">
        <div class="container mt-5 py-5">
            <h3>Scentsy</h3>
            <hr>
            <p>Shop for your Scent, your Fragrance</p>

            <!-- Search bar -->
            <!--<form action="shop.php" method="POST" class="mb-4">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search products..." name="search_keyword">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>-->

            <ul class="sidebar">
                <li onclick=showSidebar()><svg xmlns="http://www.w3.org/2000/svg" height="26" viewBox="0 -960 960 960" width="26">
                    <path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z"/>
                </svg></li>
            </ul>
        </div>
        <section class="hidden" id="featured" class="my-5">
            <div class="row mx-auto container-fluid">
                <?php while ($row = $products->fetch_assoc()) { ?>
                    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                        <img class="img-fluid mb-5" src="assets/imgs/<?php echo $row['product_image']; ?>" width="5px">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                        <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
                        <a class="btn buy-btn" href="single_product.php?product_id=<?php echo $row['product_id']; ?>">Buy Now</a>
                    </div>
                <?php } ?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination mt-5">
                        <?php if ($page_no > 1) { ?>
                            <li class="page-item">
                                <a class="page-link" href="shop.php?page_no=<?php echo $previous_page; ?>">Previous</a>
                            </li>
                        <?php } ?>
                        <?php for ($i = max(1, $page_no - $adjacents); $i <= min($page_no + $adjacents, $total_no_of_pages); $i++) { ?>
                            <li class="page-item">
                                <a class="page-link" href="shop.php?page_no=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php } ?>
                        <?php if ($page_no < $total_no_of_pages) { ?>
                            <li class="page-item">
                                <a class="page-link" href="shop.php?page_no=<?php echo $next_page; ?>">Next</a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </section>
    </section>
</div></div>
<div><?php include('footer.php');?></div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    function updatePriceValue(value) {
        document.getElementById("priceValue").textContent = "$" + value;
    }
</script>
<script>
    const priceRange = document.getElementById('customRange2');
    const priceValue = document.getElementById('priceValue');

    priceRange.addEventListener('input', function() {
        const value = parseFloat(priceRange.value);
        priceValue.textContent = '$' + value.toFixed(2); // Update displayed value
    });
</script>
<script>
    function showSidebar(){
        const sidebar = document.querySelector('.sidebarform-container')
        sidebar.style.display = 'flex'
    }

    function hideSidebar(){
        const sidebar = document.querySelector('.sidebarform-container')
        sidebar.style.display = 'none'
    }
</script>
</body>
</html>
