<?php include('header.php'); ?>

<?php

include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
  header('location: index.php');
  exit;
}



if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email = ? AND admin_password = ? LIMIT 1");
    $stmt->bind_param('ss', $email, $password);

    if ($stmt->execute()) {
        $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
        $stmt->store_result();

        if ($stmt->num_rows() == 1) {
            $stmt->fetch();

            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_logged_in'] = true;

            header('location: index.php?login_success=Logged in successfully');
        } else {
            header('location: login.php?error=There is a problem with credentials, try again later');
        }
    } else {
        header('location: login.php?error=There is a problem with the database, try again later');
    }
}
?>




      <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="Text form-weight-bold">Login</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="login-form" enctype="multipart/form-data" action="login.php" method="POST">
              <p style="color:red;" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                <div class="form-group mt-2">
                    <label>Email</label>
                    <input type="text" class="form-control" id="product-name" name="email" placeholder="Email" required>
                </div>
                <div class="form-group mt-2">
                    <label>Password</label>
                    <input type="password" class="form-control" id="product-desc" name="password" placeholder="Password" required>
                </div>
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" name="login_btn" value="Login">
            </div>
            <div class="form-group">
                    <a id="register-url" class="btn">Aren't An Admin? <span><a href="../login.php">Go Back</a></span></a>
                </div>
            </form>
        </div>
      </section>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>