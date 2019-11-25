<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

$conn = mysqli_connect($server,$username,$password,$dbname);

if(!$conn){
	echo "error";
}
