<?php

  require 'db_connection.php';

  if (isset($_POST['addProduct'])) {
    $target = 'uploads/'.basename($_FILES['product_img']['name']);

    $p_category = $_POST['product_category'];
    $p_name = $_POST['product_name'];
    $p_price = $_POST['product_price'];
    $p_stock = $_POST['product_stock'];
    $p_desc = $_POST['product_desc'];
    $p_img = $_FILES['product_img']['name'];


    $sql = "INSERT INTO products(category_id, p_name, p_price, p_stock, p_desc, p_img) VALUES('$p_category', '$p_name', '$p_price', '$p_stock', '$p_desc', '$p_img')";

    if ($conn->query($sql) === TRUE && move_uploaded_file($_FILES['product_img']['tmp_name'], $target)) {
      echo "<script type='text/javascript'>window.location.replace('products.php');alert('Product added successfully!')</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  if (isset($_POST['updateProduct'])) {
    $target = 'uploads/'.basename($_FILES['product_img']['name']);

    $p_id = $_POST['product_id'];
    $p_category = $_POST['product_category'];
    $p_name = $_POST['product_name'];
    $p_price = $_POST['product_price'];
    $p_stock = $_POST['product_stock'];
    $p_desc = $_POST['product_desc'];
    $p_status = $_POST['product_status'];
    $p_img = $_FILES['product_img']['name'];

    $sql = "UPDATE products SET category_id = '$p_category',
                                p_name = '$p_name',
                                p_price = '$p_price',
                                p_stock = '$p_stock',
                                p_desc = '$p_desc',
                                p_status = '$p_status',
                                p_img = '$p_img' WHERE product_id = '$p_id' ";

    if ($conn->query($sql) === TRUE && move_uploaded_file($_FILES['product_img']['tmp_name'], $target)) {
      echo "<script type='text/javascript'>window.location.replace('products.php');alert('Product updated successfully!')</script>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Product list</title>
  <?php include 'master.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php
      $title = 'Products';
      require 'header.php';
    ?>
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card mt-3">
                <div class="card-body">
                  <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#addProductModal" style="position: absolute; z-index: 99; margin-left: 170px">Add new product</button>
                  <table class="table" id="product_table">
                    <thead class="bg-dark">
                      <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require 'db_connection.php';

                      $sql = mysqli_query($conn, "SELECT p.*, c.category_name FROM products AS p INNER JOIN category as c ON c.category_id = p.category_id") or die(mysqli_error());
                      while($row = mysqli_fetch_array($sql)){
                      ?>
                      <tr>
                        <td><?php echo $row['p_name'] ?></td>
                        <td><?php echo "<img src='uploads/".$row['p_img']."' style='max-width: 80px; height: 50px;'" ?></td>
                        <td width="15%"><?php echo $row['category_name'] ?></td>
                        <td width="10%"><?php echo $row['p_price'] ?></td>
                        <td width="10%">
                          <?php
                            if ($row['p_status'] == 1) { ?>
                            <span class="badge badge-success">Active</span>
                            <?php }else{ ?>
                              <span class="badge badge-danger">Inactive</span>
                            <?php
                            }
                            ?>
                        </td>
                        <td width="15%">
                          <a href="#" class="btn btn-flat btn-sm btn-success"><i class="fas fa-eye"></i></a>
                          <a href="#" class="btn btn-flat btn-sm btn-primary" data-toggle="modal" data-target="#updateCategoryModal<?php echo $row['product_id'] ?>"><i class="fas fa-edit"></i></a>
                          <a href="#" class="btn btn-flat btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include 'footer.php' ?>
  </div>

  <div class="modal fade" id="addProductModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title w-100 text-center h3" id="addProductLabel"><strong>Add new product</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="products.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
              <label for="product_category" class="col-md-2 mt-n1">Category</label>
              <div class="col-lg-10">
                <select class="form-control mt-n2" name="product_category" id="product_category">
                  <option selected disabled>-- Select category --</option>
                  <?php
                    require 'db_connection.php';

                    $sql = "SELECT * FROM category;";
                    $result = mysqli_query($conn, $sql);
                    //$resultCheck = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_assoc($result)) {
                      $c_id = $row['category_id'];
                      $c_name = $row['category_name'];
                      if ($row['category_status']) { ?>
                        <option value="<?php echo $c_id; ?>"><?php echo $c_name; ?></option>
                      <?php }
                      }
                      ?>
                </select>
              </div>
            </div>
            <div class="form-group row row">
              <label for="product_name" class="col-md-2 mt-n1">Name</label>
              <div class="col-lg-10">
                <input type="text" name="product_name" id="product_name" class="form-control mt-n2" placeholder="Enter product name">
              </div>
            </div>
            <div class="form-group row">
              <label for="product_price" class="col-md-2 mt-n1">Price</label>
              <div class="col-lg-10">
                <input type="text" name="product_price" id="product_price" class="form-control mt-n2" placeholder="Enter product price">
              </div>
            </div>
            <div class="form-group row">
              <label for="product_stock" class="col-md-2 mt-n1">Stock</label>
              <div class="col-lg-10">
                <input type="text" name="product_stock" id="product_stock" class="form-control mt-n2" placeholder="Enter product stock">
              </div>
            </div>
            <div class="form-group row">
              <label for="product_desc" class="col-md-2 mt-n1">Desciption</label>
              <div class="col-lg-10">
                <textarea name="product_desc" id="product_desc" cols="30" rows="3" class="form-control mt-n2" placeholder="Enter product description"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="product_img" class="col-md-2 mt-n1">Image</label>
              <div class="col-lg-10">
                <input type="file" name="product_img" id="product_img" class="form-control mt-n2">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-2"></div>
              <div class="col-lg-10">
                <button type="submit" class="btn btn-success form-control" name="addProduct">Confirm</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php

  require 'db_connection.php';

  $p_select = mysqli_query($conn, "SELECT p.*, c.category_name FROM products AS p INNER JOIN category as c ON c.category_id = p.category_id")or die(mysqli_error());
  foreach($p_select as $row){?>
  <div class="modal fade" id="updateCategoryModal<?php echo $row['product_id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h5 class="modal-title w-100 text-center h3" id="updateCategoryLabel"><strong>Update product category</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="products.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="product_id" id="product_id" value="<?php echo $row['product_id'] ?>">
            <div class="form-group row">
              <label for="product_category" class="col-md-2 mt-n1">Category</label>
              <div class="col-lg-10">
                <select class="form-control mt-n2" name="product_category" id="product_category">
                  <option selected value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
                  <?php
                    require 'db_connection.php';
                    $c_select = mysqli_query($conn, "SELECT * FROM category")or die(mysqli_error());
                    while($c = mysqli_fetch_array($c_select)){
                      ?>
                      <option value="<?php echo $c['category_id'] ?>"><?php echo $c['category_name'] ?></option>;
                    <?php
                    }
                  ?>  
                </select>
              </div>
            </div>
            <div class="form-group row row">
              <label for="product_name" class="col-md-2 mt-n1">Name</label>
              <div class="col-lg-10">
                <input type="text" name="product_name" id="product_name" class="form-control mt-n2" placeholder="Enter product name" value="<?php echo $row['p_name'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="product_price" class="col-md-2 mt-n1">Price</label>
              <div class="col-lg-10">
                <input type="text" name="product_price" id="product_price" class="form-control mt-n2" placeholder="Enter product price" value="<?php echo $row['p_price'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="product_stock" class="col-md-2 mt-n1">Stock</label>
              <div class="col-lg-10">
                <input type="text" name="product_stock" id="product_stock" class="form-control mt-n2" placeholder="Enter product stock" value="<?php echo $row['p_stock'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="product_desc" class="col-md-2 mt-n1">Desciption</label>
              <div class="col-lg-10">
                <textarea name="product_desc" id="product_desc" cols="30" rows="3" class="form-control mt-n2" placeholder="Enter product description"><?php echo $row['p_desc'] ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="product_img" class="col-md-2 mt-n1">Image</label>
              <div class="col-lg-10">
                <input type="file" name="product_img" id="product_img" class="form-control mt-n2" value="<?php echo $row['p_img'] ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="product_status" class="col-md-2 mt-n1">Status</label>
              <div class="col-lg-10">
                <select name="product_status" id="product_status" class="form-control form-control-sm">
                  <option value="1">Enable</option>
                  <option value="0">Disable</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-2"></div>
              <div class="col-lg-10">
                <button type="submit" class="btn btn-success form-control" name="updateProduct">Confirm</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>


  <script>
  $(function () {
    $('#product_table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
  
</body>
</html>