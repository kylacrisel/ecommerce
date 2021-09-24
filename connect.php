<?php

$sname= "sql201.itelwst.online";
$uname= "itelw_29127681";
$password = "group6";
$db_name = "kyla";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}else{
	echo "successfully connected!";
}