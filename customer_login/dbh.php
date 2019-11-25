<?php

$conn = mysqli_connect("localhost","","Admin-17","ecomerce");

if(!$conn){
	die("Connection Failed".mysqli_connect_error());
}
