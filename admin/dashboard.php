<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Dashboard</title>
  <?php include 'master.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php
      $title = 'Dashboard';
      require 'header.php';
    ?>
    <div class="content-wrapper pt-4">
      <!--<div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div>
          </div>
        </div>
      </div>-->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?php
                  require 'db_connection.php';
                  $sql = "SELECT * FROM products";
                  if ($result=mysqli_query($conn,$sql)) {
                      $rowcount=mysqli_num_rows($result);
                      echo $rowcount; 
                  }
                  ?></h3>

                  <p><strong>Products</strong></p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-bag"></i>
                </div>
                <a href="products.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?php
                  require 'db_connection.php';
                  $sql = "SELECT * FROM category";
                  if ($result=mysqli_query($conn,$sql)) {
                      $rowcount=mysqli_num_rows($result);
                      echo $rowcount; 
                  }
                  ?></h3>

                  <p>Categories</p>
                </div>
                <div class="icon">
                  <i class="fas fa-sitemap"></i>
                </div>
                <a href="categories.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?php
                  require 'db_connection.php';
                  $sql = "SELECT * FROM users";
                  if ($result=mysqli_query($conn,$sql)) {
                      $rowcount=mysqli_num_rows($result);
                      echo $rowcount; 
                  }
                  ?></h3>
                  <p>Registered users</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>

                  <p>Orders</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include 'footer.php' ?>
  </div>
  
</body>
</html>