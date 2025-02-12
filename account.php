<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('server/connection.php');

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        header('location: login.php');
        exit;
    }
}

if (isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];  // Corrected variable name

    if ($password !== $confirmPassword) {
        header('location: account.php?error=Passwords do not match'); // Updated error message
    } else if (strlen($password) < 6) { // Fixed the comparison
        header('location: account.php?error=Password must be at least 6 characters');
    } else {
        $user_email = $_SESSION['user_email'];  // Add this line to get the user's email

        $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $stmt->bind_param('ss', md5($password), $user_email);

        if ($stmt->execute()) {
            header('location: account.php?message=Password has been updated');
        } else {
            header('location: account.php?error=Could not update password');
        }
    }
} else if (isset($_POST['order_pay_btn'])) {
    $order_id = $_POST['order_id']; // assuming you have the order_id in the form

    // Update the order status to "paid"
    $stmt = $conn->prepare("UPDATE orders SET order_status='paid' WHERE order_id=?");
    $stmt->bind_param('i', $order_id);

    if ($stmt->execute()) {
        header('location: account.php?message=Order status updated to paid');
    } else {
        header('location: account.php?error=Could not update order status');
    }
}

if (isset($_SESSION['logged_in'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch orders
    $stmt_orders = $conn->prepare("SELECT * FROM orders WHERE user_id=?");
    $stmt_orders->bind_param('i', $user_id);
    $stmt_orders->execute();
    $orders = $stmt_orders->get_result();
}

?>


<!-- The rest of your HTML code for the account page -->










      <?php include('header.php');?>

      <section class="my-5 py-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
            <p class="text-center" style="color: green;"><?php if(isset($_GET['register_success'])){echo $_GET['register_success'];}?></p>
            <p class="text-center" style="color: green;"><?php if(isset($_GET['login_success'])){echo $_GET['login_success'];}?></p>    
              <h3 class="Text font-weight-bold">Account</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Name: <span><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?></span></p>
                    <p>Email: <span><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];}?></span></p>
                    <p><a href="#order" id="orders-btn">Your Orders</a></p>
                    <p><a href="#contact" id="orders-btn">Your Submissions</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Log Out</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form id="account-form" method="POST" action="account.php">
                  <p class="text-center" style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                  <p class="text-center" style="color: green;"><?php if(isset($_GET['message'])){echo $_GET['message'];}?></p>
                    <h3 class="Text font-weight-bold">Change Password</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="account-password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change Password" name="change_password" class="btn" id="change-pass-btn">
                    </div>
                </form>
            </div>
        </div>
      </section>

      <section id="order" class="orders container my-5 py-3">
        <div class="orders container mt-2">
          <h2 class="font-weight-bold text-center">Your Orders</h2>
          <hr class="mx-auto">
        </div>

        <table class="orders mt-5 pt-5">
          <tr>
            <th>Order Id</th>
            <th>Order Cost</th>
            <th>Order Status</th>
            <th>Order Date</th>
            <th>Order Details</th>
          </tr>

          <?php while($row = $orders->fetch_assoc()){?>
                <tr>
                  <td>
                      <!--<div class="product-info">
                        <img src="assets/imgs/versace-eros.jpg" width="150px">
                        <div>
                          <p class="mt-3"><//?php echo $row['order_id'];?></p>
                        </div>
                      </div>-->
                      <span><?php echo $row['order_id'];?></span>
                  </td>

                  <td>
                    <span><?php echo $row['order_cost'];?></span>
                  </td>

                  <td>
                    <span><?php echo $row['order_status'];?></span>
                  </td>

                  <td>
                  <span><?php echo $row['order_date'];?></span>
                  </td>

                  <td>
                  <form method="POST" action="order_details.php">
                    <input type="hidden" value="<?php echo $row['order_status'];?>" name="order_status">
                    <input type="hidden" value="<?php echo $row['order_id'];?>" name="order_id">
                    <input type="hidden" value="<?php echo $row['order_cost'];?>" name="order_cost">
                    <input class="btn order-details-btn" name="order_details_btn" type="submit" value="Details" />
                  </form>
                  </td>
                </tr>

          <?php }?>
        </table>
      </section>

      <section id="contact" class="orders container my-5 py-3">
    <div class="orders container mt-2">
        <h2 class="font-weight-bold text-center">Contact Messages</h2>
        <hr class="mx-auto">
    </div>

    <table class="orders mt-5 pt-5">
        <tr>
            <th>Contact Name</th>
            <th>Contact Email</th>
            <th>Contact Subject</th>
            <th>Contact Message</th>
            <th>Contact Details</th>
        </tr>

        <?php while($row = $contact_messages->fetch_assoc()){
            // Truncate the message to 20 words
            $message_words = explode(' ', $row['message']);
            $short_message = implode(' ', array_slice($message_words, 0, 20));
            ?>
            <tr>

                <td>
                    <span><?php echo $row['name'];?></span>
                </td>

                <td>
                    <span><?php echo $row['email'];?></span>
                </td>

                <td>
                    <span><?php echo $row['subject'];?></span>
                </td>

                <td>
                    <span><?php echo $short_message . '...';?></span>
                </td>

                <td>
                    <form method="POST" action="contact_details.php">
                        <input type="hidden" value="<?php echo $row['id'];?>" name="contact_id">
                        <input type="hidden" value="<?php echo $row['subject'];?>" name="contact_subject">
                        <input type="hidden" value="<?php echo $row['message'];?>" name="contact_message">
                        <input class="btn order-details-btn" name="contact_details_btn" type="submit" value="More" />
                    </form>
                </td>
            </tr>
        <?php }?>
    </table>
</section>




            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>





