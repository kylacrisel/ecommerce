<?php

include '1head.php' ; ?>

<div class="w3-top header">
  <div class="w3-bar  w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item "><img src="img/logo.jpg" style="height: 40px; padding: 0px;margin: 0px;"></a>
    <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
    <a href="product.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Products</a>
    <a href="about.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
    <a href="my_orders.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">My orders</a>
    
<?php  

if(!isset($_SESSION['account'])){
 ?>
     <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-right">Login</a>
<?php
} else{
  ?>
<div class="w3-dropdown-hover w3-hide-small w3-right w3-hover-gray">
     <a href="profile.php" class=" w3-button w3-hide-small w3-padding-large w3-hover-white"> <?php echo $row->name; ?><i class="fa fa-caret-down"></i></a>
       <div class="w3-dropdown-content w3-bar-block w3-border " style="right:0px;top:55px;">
 <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large  w3-right">LogOut</a>
  </div>
    </div>
<?php
}
?> 
<a href="cart2.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-right"><img src="img/cart.png" width="30px" height="30px"></a>
<div class="w3-clear"></div>    
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
  	<a href="index.php" class="w3-bar-item w3-button  w3-padding-large w3-hover-white">Home</a>
    <a href="product.php" class="w3-bar-item w3-button w3-padding-large">Products</a>
    <a href="about.php" class="w3-bar-item w3-button w3-padding-large">About</a>
<?php  

if(!isset($_SESSION['account'])){
 ?>    
    <a href="login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
<?php
} else{
  ?>
<a href="" class="w3-bar-item w3-button w3-padding-large"><?php echo $row->name; ?></a>
<?php
}
?> 
    <a href="cart2.php" class="w3-bar-item w3-button w3-padding-large"><img src="img/cart.png" width="30px" height="30px"></a>
  </div>
</div>