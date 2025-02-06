<?php

session_start();

    if( !empty($_SESSION['cart'])){


        

    }else{
      header('location: index.php');
    }
?>




      <?php include('header.php');?>

      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="Text form-weight-bold">Check Out</h2>
            <hr class="mx-auto">

        </div>
        <div class="mx-auto container">
            <form id="checkout-form" method="POST" action="server/place_order.php">
              <p class="text-center" style="color: red;">
                    <?php if(isset($_GET['message'])){echo $_GET['message'];}?>
                    <?php if(isset($_GET['message'])) { ?>

                    <a href="login.php" class="btn btn-primary">Login</a>
                    
                    <?php }  ?>
              </p>
                <div class="form-group checkout-small-element">
                    <label>Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label>Email</label>
                    <input type="email" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
                </div>

                <div class="form-group checkout-small-element">
                    <label>Phone Number</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label>City</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="city" required>
                </div>
                <div class="form-group checkout-large-element">
                    <label>Address</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="address" required>
                </div>
                <div class="form-group checkout-btn-container">
                  <p>Total Amount: $ <?php echo $_SESSION['total'];?></p>
                    <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order">
                </div>
            </form>
        </div>
      </section>




      <div><?php include('footer.php');?></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>