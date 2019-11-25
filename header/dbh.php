<?php
$server = "localhost";
$username = "root";
$password = "Admin-17";
$dbname = "ecommerce";

$conn = mysqli_connect($server,$username,$password,$dbname);

if(!$conn){
	echo "header error";
}
