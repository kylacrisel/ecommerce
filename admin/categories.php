<?php

include 'db_connection.php';


if (isset($_POST['addCategory'])) {
  $category_name = $_POST['category_name'];
  $category_desc = $_POST['category_desc'];

  $sql = "INSERT INTO category(category_name, category_description) VALUES('$category_name', '$category_desc')";

  if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>window.location.replace('categories.php');alert('Category added successfully!')</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if (isset($_POST['updateCategory'])) {
  $category_id = $_POST['category_id'];
  $category_name = $_POST['category_name'];
  $category_desc = $_POST['category_desc'];
  $category_status = $_POST['category_status'];

  $sql = "UPDATE category SET category_name = '$category_name',
                              category_description = '$category_desc',
                              category_status = '$category_status' WHERE category_id = '$category_id' ";

  if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'>window.location.replace('categories.php');alert('Category updated successfully!')</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


mysqli_close($conn);



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | Category list</title>
  <?php include 'master.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php
    $title = 'Categories';
    require 'header.php';
    ?>
    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card mt-3">
                <div class="card-body">
                  <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addCategoryModal" style="position: absolute; z-index: 99; margin-left: 170px">Add new category</button>
                  <table class="table" id="category_table">
                    <thead class="bg-secondary">
                      <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        require 'db_connection.php';

                        $sql = mysqli_query($conn, "SELECT * FROM category") or die(mysqli_error());
                        while($row = mysqli_fetch_array($sql)){
                          ?>
                          <tr>
                            <td width="25%"><?php echo $row['category_name'] ?></td>
                            <td width="55%"><?php echo $row['category_description'] ?></td>
                            <td width="10px"><?php if ($row['category_status'] == 1) { ?>
                              <span class="badge badge-success">Active</span>
                              <?php }else{ ?>
                                <span class="badge badge-danger">Inactive</span>
                                <?php
                              
                            } ?></td>
                            <td width="10%">
                              <a href="#" class="btn btn-flat btn-sm btn-primary" data-toggle="modal" data-target="#updateCategoryModal<?php echo $row['category_id'] ?>"><i class="fas fa-edit"></i></a>
                              <a href="categories.php?category_id=<?php echo $row['category_id'] ?>" class="btn btn-flat btn-sm btn-danger" name="deleteCategory"><i class="fas fa-trash-alt"></i></a>
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

  <div class="modal fade" id="addCategoryModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="addCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title w-100 text-center h3" id="addCategoryLabel"><strong>Add new category</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="categories.php" method="post">
            <div class="form-group row row">
              <label for="category_name" class="col-md-2 mt-n1">Name</label>
              <div class="col-lg-10">
                <input type="text" name="category_name" id="category_name" class="form-control form-control-sm mt-n2" placeholder="Enter category name">
              </div>
            </div>
            <div class="form-group row">
              <label for="category_desc" class="col-md-2 mt-n1">Desciption</label>
              <div class="col-lg-10">
                <textarea name="category_desc" id="category_desc" cols="30" rows="3" class="form-control form-control-sm mt-n2" placeholder="Enter category description"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-2"></div>
              <div class="col-lg-10">
                <button type="submit" class="btn btn-info form-control" name="addCategory">Confirm</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php

  require 'db_connection.php';

  $sql = mysqli_query($conn, "SELECT * FROM category") or die(mysqli_error());
  while($row = mysqli_fetch_array($sql)){
    ?>
  <div class="modal fade" id="updateCategoryModal<?php echo $row['category_id'] ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="updateCategoryLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h5 class="modal-title w-100 text-center h3" id="updateCategoryLabel"><strong>Update product category</strong></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="categories.php" method="post">
          <input type="hidden" name="category_id" id="category_id" value="<?php echo $row['category_id'] ?>">
            <div class="form-group row row">
              <label for="category_name" class="col-md-2 mt-n1">Name</label>
              <div class="col-lg-10">
                <input type="text" name="category_name" id="category_name" class="form-control form-control-sm mt-n2" placeholder="Enter category name" value="<?php echo $row['category_name']; ?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="category_desc" class="col-md-2 mt-n1">Desciption</label>
              <div class="col-lg-10">
                <textarea name="category_desc" id="category_desc" cols="30" rows="3" class="form-control form-control-sm mt-n2" placeholder="Enter category description"><?php echo $row['category_description']; ?></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="category_status" class="col-md-2 mt-n1">Status</label>
              <div class="col-lg-10">
                <select name="category_status" id="category_status" class="form-control form-control-sm">
                  <option value="1">Enable</option>
                  <option value="0">Disable</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-2"></div>
              <div class="col-lg-10">
                <button type="submit" class="btn btn-info form-control" name="updateCategory">Confirm</button>
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
    $('#category_table').DataTable({
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