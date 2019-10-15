<?php
	include 'C:\xampp\htdocs\Ecommerce\retailer_page\dbh.php';
	session_start();

	$logout_time = $_SESSION['logout_time'];
	$customer_id = $_SESSION['customer_id'];
	$prodid =$_POST['remove_id'];

	$sql = "delete from cart WHERE cust_id='$customer_id' and cust_logout='$logout_time' and product_id='$prodid' ";
	$result = $conn->query($sql);

	header("Location: view_cart.php");