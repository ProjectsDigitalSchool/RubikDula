<?php include('header.php'); ?>

<?php

if(isset($_GET['product_id'])){

    $product_id = $_GET['product_id'];
    $product_name = $_GET['product_name'];

}else{
    header('location: index.php');
}

?>


<div class="container-fluid">
    <div class="row">
        <?php include('sidemenu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            <h2>Edit Images</h2>
            <div class="table-responsive">
                <div class="mx-auto container">
                <form id="add-product-form" enctype="multipart/form-data" method="POST" action="update_images.php">
                    <p style="color: red;" class="text-center">
                        <?php if (isset($_GET['product_failed'])) { // Fix comment marker
                            echo $_GET['product_failed'];
                        } ?>
                    </p>

                    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
                    <input type="hidden" name="product_name" value="<?php echo $product_name ?>">

                    <div class="form-group mt-2">
                        <label>Image 1</label>
                        <input type="file" class="form-control" id="image1" name="image1" placeholder="Image 1" required>
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 2</label>
                        <input type="file" class="form-control" id="image2" name="image2" placeholder="Image 2" required>
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 3</label>
                        <input type="file" class="form-control" id="image3" name="image3" placeholder="Image 3" required>
                    </div>
                    <div class="form-group mt-2">
                        <label>Image 4</label>
                        <input type="file" class="form-control" id="image4" name="image4" placeholder="Image 4" required>
                    </div>
                    <div class="forms-group mt-3">
                        <input type="submit" class="btn btn-primary" name="update_images" value="Update Images"> 
                    </div>
                </form>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>

</html>