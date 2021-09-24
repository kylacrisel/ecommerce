<?php include('connection.php'); ?>

<?php  

if(!isset($_SESSION['account'])){
 
}else
{
$accountID = $_SESSION['account'];
      $account=mysqli_query($con,"SELECT users.* from users where id = '$accountID'")or die(mysqli_error($con));
      $row=mysqli_fetch_object($account);
  }
?>
<!DOCTYPE html>
<link rel="shortcut icon" href="img/cart.png">
<html>

<body>
	

<!-- Navbar -->

<?php include('1nav.php'); ?>



<div class="container" style="margin-top: 5em;">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card" style="border-top: 5px solid green;">
        <div class="card-body">
          <table class="table" id="order_table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Delivery address</th>
                <th>Date ordered</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function () {
    $('#order_table').DataTable({
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