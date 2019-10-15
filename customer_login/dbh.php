<?php

$conn = mysqli_connect("localhost","root","","ecomerce");

if(!$conn){
	die("Connection Failed".mysqli_connect_error());
}
