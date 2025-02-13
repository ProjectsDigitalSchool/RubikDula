<?php include('header.php');?>


    <section id="Home">
        <div class="home-background"><img src="./assets/imgs/perfume-home.jpg"></div><!--Edited Part-->
        <div class="container">
            <h1>NEW COLOGNES</h1>
            <h2><span>Best Prices</span> For The <span>Best Scents</span></h2>
            <p>Scentsy offers the best of the best colognes at the cheapest discounts.</p>
            <a href="shop.php"><button class="shop-btn">Shop Cologne</button></a>
        </div>
    </section>

      <section id="brand" class="container">
        <div class="row">
            <img class="logo img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg">
            <img class="logo img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpg">
            <img class="logo img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.png">
            <img class="logo img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpg">
        </div>
      </section>

      <div class="container text-center">
                <h3>New products</h3>
                <hr>
                <p>Newest Products</p>
            </div>

      <section id="new" class="container">
        <div class="row">
        <?php include('server/get_featured_products2.php')?>

        <?php while ($row = $featured_products->fetch_assoc()) { ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <?php if ($row['product_stock'] <= 0) { ?>
        
        <?php } ?>
        <img class="img-fluid mb-5" src="assets/imgs/<?php echo $row['product_image']; ?>" width="5px">
        <div class="details">
            <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
            <h4 class="p-price">$ <?php echo $row['product_price']; ?></h4>
            <?php if ($row['product_stock'] > 0) { ?>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            <?php } else { ?>
                <button class="buy-btn" disabled>Sold Out</button>
            <?php } ?>
        </div>
    </div>
<?php } ?>
        </div>
    </section>
        <section id="featured" class="my-5">
            <div class="container text-center">
                <h3>More Featured</h3>
                <hr>
                <p>Check our Featured Products</p>
            </div>
            <section id="featured" class="my-5 pb-5">
                <div class="row mx-auto container-fluid">
                <?php include('server/get_featured_products3.php')?>


                <?php while ($row = $featured_products->fetch_assoc()) { ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <?php if ($row['product_stock'] <= 0) { ?>
            
        <?php } ?>
        <img class="img-fluid mb-5" src="assets/imgs/<?php echo $row['product_image']; ?>" width="5px">
        <div class="details">
            <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
            <h4 class="p-price">$ <?php echo $row['product_price']; ?></h4>
            <?php if ($row['product_stock'] > 0) { ?>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            <?php } else { ?>
                <button class="buy-btn" disabled>Sold Out</button>
            <?php } ?>
        </div>
    </div>
<?php } ?>
            
                </div>
            </section>
            
            </div>
        </section>
        
        </div>
    </section>

    <section id="banner" class="my-5 pb-5">
      
      <div class="winter container">
      </div>
    </section>
    
    
    <section id="featured" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
          <h3>Other Products</h3>
          <hr>
          <p>Check the greatest Fragrances</p>
      </div>
      <section id="featured" class="my-5">
          <div class="row mx-auto container-fluid">

          <?php include('server/get_featured_products.php')?>


          <?php while ($row = $featured_products->fetch_assoc()) { ?>
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <?php if ($row['product_stock'] <= 0) { ?>
        
        <?php } ?>
        <img class="img-fluid mb-5" src="assets/imgs/<?php echo $row['product_image']; ?>" width="5px">
        <div class="details">
            <h5 class="p-name"><?php echo $row['product_name'] ?></h5>
            <h4 class="p-price">$ <?php echo $row['product_price']; ?></h4>
            <?php if ($row['product_stock'] > 0) { ?>
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><button class="buy-btn">Buy Now</button></a>
            <?php } else { ?>
                <button class="buy-btn" disabled>Sold Out</button>
            <?php } ?>
        </div>
    </div>
<?php } ?>
          </div>
        </section>
    </section>

    

        <?php include('footer.php');?>

                
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </body>
</html>  

        
