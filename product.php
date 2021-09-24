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

<html>
<?php include('1head.php'); ?>
<body>
	

<!-- Navbar -->

<?php include('1nav.php'); ?>



<body>


<!---- products ---->
<!-- About Section -->
<div class="w3-container" style="padding:128px 16px" id="about">
<h3 class="w3-center title" >PRODUCTS</h3>
  <p class="w3-large">Filter:</p>
  <div class="w3-row-padding w3-center" style="margin-top:64px">
    <div class="w3-quarter">
      <img src="img/icon/featured.png" class="w3-margin-bottom ">
      <p class="w3-large">Featured</p>
      
    </div>
    <div class="w3-quarter" class=" w3-margin-bottom ">
      <img src="img/icon/latest.png">
      <p class="w3-large">Latest</p>
      
    </div>
    <div class="w3-quarter" class=" w3-margin-bottom ">
     <img src="img/icon/140.png">
      <p class="w3-large">P 140.00</p>
      
    </div>
    <div class="w3-quarter">
     
      <img src="img/icon/160.png" class=" w3-margin-bottom ">
      <p class="w3-large">P 160.00</p>
      
    </div>
  </div>
</div>



<!-- Product grid -->
  <div class="w3-row-padding">
<?php  
   $post=mysqli_query($con,"SELECT * from products")or die(mysqli_error($con));
              while($rowpost=mysqli_fetch_object($post)){
                if ($rowpost->p_status) {
              ?>  

    <div class="w3-third w3-container w3-margin-bottom" >
      <div class="w3-container" style="border: solid; padding: 10px; height: 550px; ">
        <div class="w3-display-container text-center">
          <img src="admin/uploads/<?php echo $rowpost->p_img; ?>" style="max-width:100%;height: 300px">
          <span class="w3-tag w3-display-topleft">New</span>
          <div class="w3-display-middle w3-display-hover">
            <a href="viewproduct.php?productID=<?=$rowpost->product_id?>"><button class="w3-button w3-black">Buy now <i class="fas fa-shopping-cart"></i></button></a>
          </div>
        </div>
        <p class="px-3 pt-3 h4"><strong><?php echo $rowpost->p_name; ?></strong><b class="w3-right">&#8369;<?php echo $rowpost->p_price; ?></b></p>
        <p class="px-3 pt-3"><?php echo $rowpost->p_desc ?></p>
      </div>
      
    </div>
<?php } 
}?>
    
  </div>

<!------- footer ------>
<?php include('1footer.php'); ?>
	<!--- js for toggle menu ----->
	<?php include('2homescript.php'); ?>
	

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

</body>
</html>
