
<?php include('header.php');?>

<?php
include('server/connection.php');

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
}



if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email = ? AND user_password = ? LIMIT 1");
    $stmt->bind_param('ss', $email, $password);

    if ($stmt->execute()) {
        $stmt->bind_result($user_id, $username, $user_email, $user_password);
        $stmt->store_result();

        if ($stmt->num_rows() == 1) {
            $stmt->fetch();

            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $username;
            $_SESSION['user_email'] = $user_email;
            $_SESSION['logged_in'] = true;

            header('location: account.php?login_success=Logged in successfully');
        } else {
            header('location: login.php?error=There is a problem with credentials, try again later');
        }
    } else {
        header('location: login.php?error=There is a problem with the database, try again later');
    }
}
?>

<!-- The rest of your HTML code for the login form -->










      <section  class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="Text form-weight-bold">Login</h2>
            <hr class="mx-auto">

        </div>
        <div class="mx-auto container">
            <form id="login-form" action="login.php" method="POST">
              <p style="color:red;" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login">
                </div>
                <div class="form-group">
                    <a id="register-url" class="btn">Don't Have An Account? <span><a href="register.php">Sign Up</a></span></a><br>
                    <a id="register-url" class="btn">Or <span><a href="admin/login.php">Log In As Admin</a></span></a>
                </div>
            </form>
        </div>
      </section>




      <div><?php include('footer.php');?></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>