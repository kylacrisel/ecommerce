<?php include('connection.php'); ?>

<?php  

if(!isset($_SESSION['account'])){
 
}else
{
$accountID = $_SESSION['account'];
      $account=mysqli_query($con,"SELECT users.* from users where id = '$accountID'")or die(mysqli_error($con));
      $row=mysqli_fetch_object($account);
  }
 $myid = $accountID;
?>
<!DOCTYPE html>

<html>
<?php include('1head.php'); ?>
<body>
	

<!-- Navbar -->

<?php include('1nav.php'); ?>
<div class="w3-container" style="padding:128px 16px" id="about">
<div class="w3-row-padding">
  <div class="w3-half ">
<h2 class="w3-center" style="color:red;">User Info</h2>
<div style="border: 3px solid pink; padding: 20px;">
<h3>Name:<?php echo $row->name; ?></h3>
<h3>Gender:<?php echo $row->gender; ?></h3>
<h3>Address:<?php echo $row->addresshead; ?></h3>
<h3>Mobile number:<?php echo $row->mobilenumber; ?></h3>
<h3>Birthday:<?php echo $row->birthday; ?></h3>
<button class="w3-btn w3-black" style="float: right; width: 100px;">Edit</button>
<br><br>
</div>

<div class="w3-half ">
  </div>
</div>

<style type="text/css">
  th,td,tr{
    border: solid 2px black;
  }

</style>
  <div class="w3-row-padding">
                      <h2 class="w3-center">All Transaction Here</h2>
<style>
table,  td {
  border: 1px solid black;
 
}
th{
background-color: gray;
color: white;
}
th, td {
  padding: 15px;
  text-align: left;
}
#t01 {
  width: 100%;    
  background-color: #f1f1c1;
}
</style>
               <?php

$slide12=mysqli_query($con,"SELECT cart.*,items.* from cart,items where cart.itemID = items.id and cart.accountID = '$myid' group by cart.orderID")or die(mysqli_error($con));
              while($rowslide12=mysqli_fetch_object($slide12))
              {
                if ($rowslide12->orderID!='1') {
                  
               
$od=$rowslide12->orderID;                

?>
      
       
    
       
          <table id="t01">
            <thead>
              <tr >
                <th colspan="2"style="background-color: white;color: black;" ><sup>Transaction ID:</sup><?php echo $rowslide12->orderID ; ?></th>
                <th colspan="2"style="background-color: white;color: black;"><sup>Transaction Date:</sup></sub><?php echo $rowslide12->cartDATE ; ?></th>
               
              </tr>
            </thead>
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
              <?php
$sumq=0;
$sumqt=0;
$slide1=mysqli_query($con,"SELECT cart.*,items.* from cart,items where cart.itemID = items.id and cart.accountID = '$myid'")or die(mysqli_error($con));
              while($rowslide1=mysqli_fetch_object($slide1))
              {
                
                if ($rowslide1->orderID == $od) {

                 $sumq = $rowslide1->item_price* $rowslide1->cartCOUNT;
                 $sumqt = $sumqt + $sumq;
           
              

?>
                    <tr>
                      <td ><span><?php echo $rowslide1->item_name ; ?></span></td>
                      <td>x<?php echo $rowslide1->cartCOUNT; ?></td>
                      <td> <span><?php echo $rowslide1->item_price ; ?></span></td>
                       <td> <span><?php echo $sumq ; ?></span></td>
                    </tr>
<?php
}}
?> 
             
              <tr>
                <td colspan="3" style="background-color: white;">
                  <p>Subtotal</p>
                </td>
                
                <td>
                  <p>P<?php echo $sumqt ; ?>.00</p>
                </td>
              </tr>


              <tr>
                <td colspan="3" style="background-color: white;">
                  <p>Shipping</p>
                </td>
                
                <td>
                  <p> P120.00</p>
                </td>
              </tr>
              <tr>
                <td colspan="3" style="background-color: white;">
                  <p>Total</p>
                </td>
               
                <td >
                  <h4 >P<?php echo $sumqt +120; ?>.00</h4>
                </td>
              </tr>
              <tr>
                <td colspan="4" style="text-align: center;background-color:pink;">
                  <h4>Thank you. Your order has been received.</h4>
                </td>
              </tr>
            </tbody>
          </table>
        
<br>  <br>  <br>  <br>    
<?php
}}
?>    

              </div>
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
