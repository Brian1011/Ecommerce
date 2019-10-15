<?php
//include 'C:\xampp\htdocs\Ecommerce\retailer_page\dbh.php';
include '../header/dbh.php';
session_start();


if(isset($_SESSION['prevoius_url'])){
	$url = $_SESSION['prevoius_url'];
}else{
	$url = "..\Ecommerce\index.php";
}

if(isset($_SESSION['id'])){
	//update the timestamp of the current user
	$logout_time = $_SESSION['logout_time'];
	$customer_id = $_SESSION['customer_id'];

	//the time is updated
	$sql = "UPDATE customer SET logout=null WHERE user_id='$customer_id'";
	$result =$conn->query($sql);

	session_destroy();
	echo "you have been logged out"."<br>";
	echo $url;
	header("Location:".$url);
}