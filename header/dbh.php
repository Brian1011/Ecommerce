<?php
$server = "localhost";
$username = "root";
$password = "Admin-17";
$dbname = "ecomerce";

$conn = mysqli_connect($server,$username,$password,$dbname);

if(!$conn){
	echo "error";
}
