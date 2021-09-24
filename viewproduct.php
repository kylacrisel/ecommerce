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
<?php  
$productID = $_GET['productID']; 

 $productduct=mysqli_query($con,"SELECT * from products where product_id = '$productID'")or die(mysqli_error($con));
      $rowproductduct=mysqli_fetch_object($productduct);
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
<div class="w3-container" style=" padding-top: 128px " id="about">
<h3 class="w3-center title" >VIEW PRODUCTS</h3>
  
  
  
</div>



  <div class="w3-row-padding">
    <div class="w3-half w3-margin-bottom text-center">
        <img src="admin/uploads/<?php echo $rowproductduct->p_img; ?>" style="max-width:100%; height: 500px;" onclick="onClick(this)" alt="Concrete meets bricks">
    </div>
        
    <div class="w3-half">
      <ul class="w3-ul w3-light-grey w3-center">
        <li class="w3-red w3-xlarge w3-padding-32"><?php echo $rowproductduct->p_name; ?></li>
        <li class="w3-padding-16"><b>Price: </b><?php echo $rowproductduct->p_price; ?></li>
        <li class="w3-padding-16"><b>Description: </b><?php echo $rowproductduct->p_desc ?></li>
        <li class="w3-padding-16" >Ratings: <i class="fa fa-star" style="color: orange;"></i><i class="fa fa-star" style="color: orange;"></i><i class="fa fa-star" style="color: orange;"></i><i class="fa fa-star" style="color: orange;"></i><i class="fa fa-star"></i></li>
       
          
 <form method="post" action="query.php">
  <div class="d-flex justify-content-center">
      <div class="p-2 mt-n4">
        <button type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="noofitems">
          <span class="glyphicon glyphicon-minus"></span>
        </button>
      </div>

      <div class="p-2">
        <input type="text" name="noofitems" class="form-control input-number" value="1" min="1" max="100">
      </div>

      <div class="p-2 mt-n4">
        <button type="button" class="btn btn-success btn-number" data-type="plus" data-field="noofitems">
          <span class="glyphicon glyphicon-plus"></span>
        </button>
      </div>
    </div>
  </li>
<li class="w3-padding-16" >
  Color:
  <img src="img/icon/black.png" style="width: 50px;">
  <img src="img/icon/white.png" style="width: 50px;">
  <img src="img/icon/red.png" style="width: 50px;">
  <img src="img/icon/blue.png" style="width: 50px;">
  <img src="img/icon/yellow.png" style="width: 50px;">
</li>
 <input type="tex" name="accountID" value="<?php echo $row->id; ?>" hidden="">
             <input type="text" name="itemID" value=" <?php echo $productID; ?> " hidden>
        <li class="w3-light-grey w3-padding-24">
          <button name="btnaddtocart" class="w3-button w3-red w3-padding-large w3-hover-black">Add To Cart</button>
        </li>
      </ul>
</form>
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
