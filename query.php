<?php 
require 'connection.php';


 if(isset($_POST['btnaddtocart']))
        { 

           
            $noofitems=$_POST['noofitems'];
            $itemID=$_POST['itemID'];
            $accountID=$_POST['accountID'];
         date_default_timezone_set('Asia/Manila');
$date = date('m/d/Y', time());
         
            $addto=mysqli_query($con,"INSERT into cart ( cartCOUNT ,accountID,itemID,orderID ,cartDATE) VALUES('$noofitems','$accountID','$itemID','1','$date')")or die(mysqli_error($con));
            if($addto)
            {
               $_SESSION['mess']='add';
                echo"<script type='text/javascript'>window.location.replace('cart2.php');</script>";  
            
            }
        }
if(isset($_POST['btnsignup']))
        { 

           
            $name=$_POST['name'];
            $birthdate=$_POST['birthday'];
            $gender=$_POST['gender'];
            $address=$_POST['address'];
            $number=$_POST['number'];
             $username=$_POST['username'];
              $password=$_POST['password'];
              
            date_default_timezone_set('Asia/Manila');
$date = date('m/d/Y h:i:s a', time());
            
            $add=mysqli_query($con,"INSERT into users (name , birthday, gender, mobilenumber,username ,password, datecreated ,addresshead) VALUES('$name','$birthdate','$gender', '$number',  '$username','$password' ,'$date','$address') ");
         
            if($add)
            {
               $_SESSION['mess']='add';
                echo"<script type='text/javascript'>window.location.replace('login.php');alert('Successfully Register, Login Now?!')</script>";  
            
            }
        }

if(isset($_POST['deletecartitem']))
        { 

           
            $itemno=$_POST['itemno'];
           
            
            $delll=mysqli_query($con,"DELETE FROM cart WHERE cartID='$itemno'");
         
            if($delll)
            {
               $_SESSION['mess']='add';
                echo"<script type='text/javascript'>window.location.replace('cart2.php');alert('Successfully Deleted!')</script>";  
            
            }
        }

        if(isset($_POST['btncomfirm']))
        { 

            date_default_timezone_set('Asia/Manila');
            $date1 = date('m/d/Y', time());

           
            $iddd=$_POST['iddd'];
            date_default_timezone_set('Asia/Manila');
            $date = date('m-d-Y-h-i-s-a', time());
            $date2="HITECH".$date;
            $delll=mysqli_query($con,"UPDATE cart SET orderID = '$date2' WHERE accountID ='$iddd' AND orderID = '1' ");
            if($delll)
            {
               $_SESSION['mess']='add';
                echo"<script type='text/javascript'>window.location.replace('checkout.php');alert('Successfully Item Buy!')</script>";  
            }
        }
?>