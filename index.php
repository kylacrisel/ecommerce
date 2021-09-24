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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<html>
<?php include('1head.php'); ?>
<style>
	#p_img{
		max-width: 200px;
	}
</style>
<body>
	

<!-- Navbar -->

<?php include('1nav.php'); ?>

<section class="home" id="home">
	<div class="header">
	<div class="container">
		<div class="navbar">
		


		
		</div>
		<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<center>
				<h1> When Quality <br> Truly Matters! </h1>
				<p> A shirt's not just a shirt. <br> It's the experience of what goes into that shirt.</p>
				<a href="product.php" class="btn" style="border: 1px brown solid; width: 200px;"> Shop Now &#8594;</a></center>
		
			</div>
			</div>
			<center>
			<div class="col-md-12">
				<img id="p_img" src="img/tshirts.jpg" style="float: width: 200px; height: auto;">
			</div>
		</div> 
		</center>
		</div>
	</div>
</section>



</div>


<!---- products ---->
<section class="products"id="products">
<div class="products">
	<div class="small-container">
		<h2 class="title"> Products </h2>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12 my-2">
				<img id="p_img" src="img/1.jpg">
			</div>
			<br>
			<div class="col-lg-4 col-md-4 col-sm-12 my-2">
				<img id="p_img" src="img/2.jpg">
			</div>
			<br>
			<div class="col-lg-4 col-md-4 col-sm-12 my-2">
				<img id="p_img" src="img/3.jpg">
			</div>
		</div>
	</div>
</div>

<!---- featured products ---->
<section class="featured"id="featured">
	<div class="small-container">
		<h2 class="title"> Featured Products </h2>
		<div class="row">
			<?php
			require 'admin/db_connection.php';
			
			
			$sql = mysqli_query($conn, "SELECT p.*, c.category_name FROM products AS p INNER JOIN category as c ON c.category_id = p.category_id") or die(mysqli_error());
			while($row = mysqli_fetch_array($sql)){
				if ($row['p_status']) {
			?>
				<div class="col-lg-3 col-md-4 col-sm-12">
					<div class="card">
						<div class="card-body">
							<?php echo "<img src='admin/uploads/".$row['p_img']."' style='max-width: 250px; height: 200px;'" ?>
							<br>
							<h4><?php echo $row['p_name'] ?></h4>
							<p><?php echo $row['p_price'] ?></p>
						</div>
					</div>
				</div>
			<?php
				}
			}
			?>
			<!--<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" id="p_img" src="img/140.jpg">
				<h4> OFF Shirt </h4>
				<p> Php 140.00 </p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" id="p_img" src="img/160.jpg">
				<h4>Inspirational Shirt </h4>
				<p> Php 160.00 </p>
			</div>
		<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" id="p_img" src="img/170.jpg">
				<h4> Simson Shirt </h4>
				<p> Php 170.00 </p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" id="p_img" src="img/01.jpg">
				<h4> Satoru Gojo Shirt </h4>
				<p> Php 189.00 </p>
			</div>
	</div>
	<h2 class="title"> Latest Products </h2>
	<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12">
				<img id="p_img" src="img/td1.jpg">
				<h4> Plain Tie Dye Shirt </h4>
				<p> Php 219.00</p>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12">
				<img id="p_img" src="img/td2.jpg">
				<h4> Plain Tie Dye Shirt </h4>
				<p> Php 219.00</p>
			</div>
		<div class="col-lg-3 col-md-3 col-sm-12">
				<img id="p_img" src="img/td3.jpg">
				<h4> Plain Tie Dye Shirt </h4>
				<p> Php 219.00 </p>
			</div>
	</div>
	<h2 class="title"> P140.00 </h2>
	<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/4.jpg">
				<p> Php 140.00 </p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/5.jpg">
				<p> Php 140.00 </p>
			</div>
		<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/6.jpg">
				<p> Php 140.00 </p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/7.jpg">
				<p> Php 140.00 </p>
			</div>
	</div>
	<h2 class="title"> P160.00 </h2>
	<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/8.jpg">
				<p> Php 160.00 </p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/9.jpg">
				<p> Php 160.00 </p>
			</div>
		<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/10.jpg">
				<p> Php 160.00 </p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/11.jpg">
				<p> Php 160.00 </p>
			</div>
	</div>
	<h2 class="title"> P170.00 </h2>
	<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/12.jpg">
				<p> Php 170.00 </p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/13.jpg">
				<p> Php 170.00 </p>
			</div>
		<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/14.jpg">
				<p> Php 170.00 </p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/15.jpg">
				<p> Php 170.00 </p>
			</div>
	</div>
	<h2 class="title"> P189.00 </h2>
	<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/16.jpg">
				<p> Php 189.00 </p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/17.jpg">
				<p> Php 189.00 </p>
			</div>
		<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/18.jpg">
				<p> Php 189.00 </p>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-12 border border-dark">
				<img id="p_img" src="img/19.jpg">
				<p> Php 189.00 </p>
			</div>
		</div>
	</div>-->
	
<!---- developers ----->
<section class="about"id="about">
		<div class="container">
		<h2 class="title"> About </h2>
		<div class="about">
			<div class="row">
				<div class="col-md-9">
					<p> Super comfortable to wear. Nice fabric and worth the money on this shirt.<br>
					The purpose of our program is to feel the customer of what are fabric for young women and men who love to shop online. And so they can easily find what they want to buy. They can easily choose the design, color and size.</p>
					</div>
				</div>

				</div>
			</div>
			<hr>
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
