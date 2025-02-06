<?php include('header.php'); ?>

<?php

include('server/connection.php');

$recommendedProducts = []; // Array to store recommended products
$recommendedProductIds = []; // Array to keep track of recommended product IDs
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null; // Get the user ID from the session

if (isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

  
    $product_stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $product_stmt->bind_param("i", $product_id);
    $product_stmt->execute();
    $product_result = $product_stmt->get_result();
    if ($product_result->num_rows === 0) {
        echo "Product not found.";
        exit;
    }
    $product = $product_result->fetch_assoc();

    // Avoid recommending the same product being viewed
    $recommendedProductIds[] = $product_id;

    // Attempt to fetch personalized recommendations if user is logged in
    if ($userId) {
        $personalized_sql = "
        SELECT p.*, COUNT(oi.product_id) as order_count
        FROM order_items oi
        INNER JOIN products p ON oi.product_id = p.product_id
        WHERE oi.user_id = ?
        GROUP BY p.product_id
        ORDER BY order_count DESC
        LIMIT 3
        ";

        $personalized_stmt = $conn->prepare($personalized_sql);
        $personalized_stmt->bind_param("i", $userId);
        $personalized_stmt->execute();
        $personalized_result = $personalized_stmt->get_result();

        while ($row = $personalized_result->fetch_assoc()) {
            if (!in_array($row['product_id'], $recommendedProductIds)) {
                $recommendedProducts[] = $row;
                $recommendedProductIds[] = $row['product_id'];
            }
        }
    }

    // Fill with category-based recommendations if not enough personalized products
    if (count($recommendedProducts) < 3) {
        $needed = 3 - count($recommendedProducts);
    
        // First, get the category of the current product
        $category_stmt = $conn->prepare("SELECT product_category FROM products WHERE product_id = ?");
        $category_stmt->bind_param("i", $product_id);
        $category_stmt->execute();
        $category_result = $category_stmt->get_result();
        if ($category_row = $category_result->fetch_assoc()) {
            $current_category = $category_row['product_category'];
    
            // Fetch products from the same category
            $category_based_sql = "
            SELECT * FROM products
            WHERE product_category = ? AND product_id != ?
            LIMIT ?
            ";
    
            $category_based_stmt = $conn->prepare($category_based_sql);
            if (!$category_based_stmt) {
                echo "Error preparing statement: " . $conn->error;
                exit;
            }
    
            $category_based_stmt->bind_param("sii", $current_category, $product_id, $needed);
            $category_based_stmt->execute();
            $category_based_result = $category_based_stmt->get_result();
    
            while ($row = $category_based_result->fetch_assoc()) {
                if (!in_array($row['product_id'], $recommendedProductIds)) {
                    $recommendedProducts[] = $row;
                    $recommendedProductIds[] = $row['product_id'];
                }
            }
        }
    }
    

    // Add random products if still not enough recommendations
    if (count($recommendedProducts) < 3) {
        $needed = 3 - count($recommendedProducts);
        $randomProductsSql = "
        SELECT * FROM products
        WHERE product_id != ?
        ORDER BY RAND()
        LIMIT ?
        ";

        $randomProductsStmt = $conn->prepare($randomProductsSql);
        $randomProductsStmt->bind_param("ii", $product_id, $needed);
        $randomProductsStmt->execute();
        $randomProductResults = $randomProductsStmt->get_result();

        while ($row = $randomProductResults->fetch_assoc()) {
            if (!in_array($row['product_id'], $recommendedProductIds)) {
                $recommendedProducts[] = $row;
                $recommendedProductIds[] = $row['product_id'];
            }
        }
    }

    // Ensuring that we have exactly 3 product recommendations
    $recommendedProducts = array_slice($recommendedProducts, 0, 3);

} else {
    header('location: index.php');
    exit;
}

// Here you can include your HTML and PHP code to display the product and recommended products
// ...

?>
<style>
    /* Custom CSS for styling */
    #quantity {
        width: 20px !important;
        text-align: center;
        list-style-type: none;
    }

    #volumeSelect {
        width: 100%;
    }

    .sold-out-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 43%;
        height: 125%;
        margin-top: 70px;
        background-color: rgba(255, 255, 255, 0.8);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        z-index: 999;
    }

    /* Adjust the position of the main image */
   
</style>


    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">

       


        <div class="col-lg-5 col-md-6 col-sm-12 position-relative">
            
                <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $product['product_image']?>" id="mainImg" >

         
            <div class="small-img-group">
                <div class="small-img-col"><img src="assets/imgs/<?php echo $product['product_image']?>" width="100%" class="small-img"></div>
                <div class="small-img-col"><img src="assets/imgs/<?php echo $product['product_image2']?>" width="100%" class="small-img"></div>
                <div class="small-img-col"><img src="assets/imgs/<?php echo $product['product_image3']?>" width="100%" class="small-img"></div>
            </div>
        </div>
            <div class="col-lg-6 col-md-12 col-12 mt-5">
                <h4><?php echo $product['product_category'];?> Fragrance</h4>
                <h3 class="py-4"><?php echo $product['product_name'];?></h3>
                <h2>$<?php echo $product['product_price'];?></h2>
                <h4 class="py-4">Stock: <?php echo $product['product_stock'];?></h4>

                <?php if ($product['product_stock'] > 0): ?>
    <form method="POST" action="cart.php" class="mt-3">
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>"/>
        <input type="hidden" name="product_image" value="<?php echo $product['product_image']?>"/>
        <input type="hidden" name="product_name" value="<?php echo $product['product_name']?>"/>
        <input type="hidden" name="product_price" value="<?php echo $product['product_price']?>"/>

        <div class="mb-3 d-flex align-items-center">
            <label for="quantity" class="form-label me-3">Quantity:</label>
            <div class="input-group">
                <button type="button" class="btn btn-outline-secondary" onclick="decrementQuantity()">-</button>
                <input type="number" id="quantity" name="product_quantity" value="1" min="1" max="<?php echo $product['product_stock']; ?>" class="form-control text-center" >
                <button type="button" class="btn btn-outline-secondary" onclick="incrementQuantity()">+</button>
            </div>
        </div>

        <div class="mb-3">
            <label for="volumeSelect" class="form-label">Select Ml:</label>
            <select class="form-select" id="volumeSelect" name="product_ml">
                <option value="10">10ml</option>
                <option value="25">25ml</option>
                <option value="50" selected>50ml</option>
                <option value="75">75ml</option>
                <option value="100">100ml</option>
            </select>
        </div>

        <button class="buy-btn btn btn-primary" type="submit" name="add_to_cart">Add To Cart</button>
    </form>
<?php elseif ($product['product_stock'] == 0): ?>
    <div class="sold-out-overlay">
        <img src="assets/imgs/soldou2.png" alt="SOLD OUT" width="300px" style="position: absolute; margin-left: 200px;">
    </div>
    <h4 class="sold-out-message mt-3">SOLD OUT</h4>
<?php else: ?>
    <h4 class="sold-out-message mt-3">SOLD OUT</h4>
<?php endif; ?>

                <h4 class="mt-5 mb-3">Product Details</h4>
                <span><?php echo $product['product_description'];?></span>
            </div>


          
        </div>
    </section>

    <section id="featured" class="my-5">
        <div class="container text-center">
            <h3>More Fragrances</h3>
            <hr class="mx-auto">
        </div>
        <section id="featured" class="my-5 pb-5">
            <div class="row mx-auto container-fluid">
            <?php foreach ($recommendedProducts as $row): ?>
    <div class="product text-center col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/<?php echo htmlspecialchars($row['product_image']); ?>" width="100%" style="width: 50%;">
        <!-- Add more product details here -->
        <h5 class="p-name"><?php echo htmlspecialchars($row['product_name']); ?></h5>
        <h4 class="p-price">$<?php echo htmlspecialchars($row['product_price']); ?></h4>
        <a href="single_product.php?product_id=<?php echo $row['product_id'];?>"><button class="buy-btn">Buy Now</button></a>
    </div>
<?php endforeach; ?>

            </div>
        </section>
        
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        var mainImg =  document.getElementById("mainImg");
        var smallImg =document.getElementsByClassName("small-img");

        for(let i=0; i<3; i++){
                smallImg[i].onclick = function(){
                mainImg.src = smallImg[i].src;
                }
        }
    </script>
    <script>
    // JavaScript functions to increment and decrement quantity
    function incrementQuantity() {
        var quantityInput = document.getElementById("quantity");
        var maxStock = <?php echo $product['product_stock']; ?>;
        if (parseInt(quantityInput.value) < maxStock) {
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }
    }

    function decrementQuantity() {
        var quantityInput = document.getElementById("quantity");
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    }
</script>
</body>
</html>