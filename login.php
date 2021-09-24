<?php 
        include('connection.php');
?>
  <?php 
if(isset($_SESSION['account']))
{
//unset($_SESSION['cid']);
unset($_SESSION['account']);
}
echo "<script type='text/javascript'>
$(document).ready(function () {
 
window.setTimeout(function() {
    $('.alert').fadeTo(1500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
 
});

</script>";
 if(isset($_POST['btnlogin']))
    {
       $user=$_POST['username'];
       $pass=$_POST['password'];
 
       $s = mysqli_query($con,"SELECT * FROM users where password='". $pass ."' and username = '". $user ."'") or die(mysqli_errno($con));
       $r = mysqli_fetch_object($s);
       $count=mysqli_num_rows($s);
       if($count>0){
        $_SESSION['account']=$r->id;

          //admin Link
        echo"<script type='text/javascript'>window.location.replace('index.php');alert('Login Successfully!')</script>";  
        }
      
       
       else
       {
        echo"<script type='text/javascript'>alert('wrong password or username');</script>";
       }
       
     }
?>
<!DOCTYPE html>
<html>
<head>
     <title>LOGIN</title>
     <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

     <form action="login.php" method="post">
          <center>
     	<h3>LOGIN</h3>
          </center>
     	
     	<label>User Name</label>
     	<input type="text" name="username" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit" name="btnlogin">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
     </body>
     </html>
