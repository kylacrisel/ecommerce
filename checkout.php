<?php include('connection.php'); ?>
<?php  

if(!isset($_SESSION['account'])){
 echo"<script type='text/javascript'>window.location.replace('index.php')</script>";
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
<div class="w3-container" style=" padding-top: 50px " id="about">
<h2 class="w3-center title" >Checkout</h2>  
</div>

 
<div class="w3-row-padding">
    <div class="w3-half w3-margin-bottom ">
      <ul class="w3-ul  ">
        <li class="w3-white w3-xlarge w3-center">Customer Details</li>
        
        <li class="w3-padding-16"><b>Name: </b><?php echo $row->name;  ?></li>
        <li class="w3-padding-16"><b>Birthdate: </b><?php echo $row->birthday;  ?></li>
        <li class="w3-padding-16"><b>Gender: </b><?php echo $row->gender;  ?></li>
        <li class="w3-padding-16"><b>Address: </b><?php echo $row->addresshead;  ?></li>
        <li class="w3-padding-16"><b>Mobile Number: </b><?php echo $row->mobilenumber;  ?></li>
        <li class="w3-padding-16"><input type="radio" name="" checked="">Ship to this address</li>      
      </ul>
    </div>
    <div class="w3-half ">
     <ul class="w3-ul w3-light-grey w3-center">
        <li class="w3-pink w3-xlarge">Your Order</li>
        <?php

$sumtotal=0;
$carttt=mysqli_query($con,"SELECT cart.*,users.*,products.* from cart,users,products where users.id = cart.accountID and products.product_id = cart.itemID " )or die(mysqli_error($con));
              while($rowlastestfeaturedslidecarttt=mysqli_fetch_object($carttt))
              {
                if ($rowlastestfeaturedslidecarttt->accountID==$accountID && $rowlastestfeaturedslidecarttt->orderID == '1') {
               
                
?> 
        <li class="w3-padding-16"><p><?php echo $rowlastestfeaturedslidecarttt->p_name;  ?>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $rowlastestfeaturedslidecarttt->p_price;  ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <b>X<?php echo $rowlastestfeaturedslidecarttt->cartCOUNT;  ?></b></p></li>
      <?php
                                       $total=$rowlastestfeaturedslidecarttt->cartCOUNT * $rowlastestfeaturedslidecarttt->p_price;
                                     

                                       $sumtotal= $sumtotal+$total;
                                        ?>
<?php
}}
?>          
        <li class="w3-padding-16">Subtotal: P<?php echo $sumtotal;?></li>
        <li class="w3-padding-16">Delivery: P120</li>
        <li class="w3-padding-16" >Total: P<?php echo $sumtotal+120;?></li>
       

   



        
      </ul>
      <br>  <br>  <br>
      <div class="w3-row">
       <div class="w3-half w3-margin-bottom ">
      </div>
      <div class="w3-half ">
        <form action="query.php" method="post">
          <ul class="w3-ul w3-light-grey ">
            <li class="w3-black  w3-padding-32 w3-center">Payment Method</li>
            
            <li class="w3-padding-16 w3-left">
              <input type="radio" name="" checked=""> &nbsp; &nbsp; &nbsp;Cash On Delivery
            </li>
            <li class="w3-padding-16 w3-left">
              <input type="checkbox" name="">&nbsp; &nbsp; &nbsp;I have read and accept the terms and conditions
            </li>
            <li class="w3-padding-16  w3-center" >
              <input type="" name="iddd" value="<?php echo $row->id;?>" hidden>
              
              <p>
                <button name="btncomfirm" class="w3-button w3-green w3-padding-large w3-hover-black">BUY</button>
              </p>   
            </li>
          </ul>
          </form>
        </div>
      </div>
    </div>
  </div>

  <br>  <br>  <br>

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
<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}
</script>
<script type="text/javascript">
  //plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
</script>
</body>
</html>
