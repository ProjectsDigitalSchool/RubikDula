<?php session_start(); ?>

<?php include('../server/connection.php'); ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Scentsy Admin Page</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../assets/style.css">
  </head>
  <body>
    
  <header class="navbar navbar-dark sticky-top bg-dark p-0 shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Scentsy Dashboard</a>
      <?php if(isset($_SESSION['admin_logged_in'])) { ?>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="logout.php?logout=1">Sign out</a>
          </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">
                  <span data-feather="home"></span>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <span data-feather="file"></span>
                  Orders
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="account.php">
                  <span data-feather="bar-chart-2"></span>
                  Account
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="add_product.php">
                  <span data-feather="users"></span>
                  Add new product
                </a>
              </li>
              <?php } ?>

          
            
        </ul>
      </div>
    </div>
  </header>
