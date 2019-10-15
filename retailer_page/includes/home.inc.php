<?php

include '../dbh.php';
session_start();

$upload_images = $_FILES['myimage']['name'];
$folder = '/xampp/htdocs/Ecommerce/db_images/';

//another alternative to store them uniquely
$now = time();

//trial
move_uploaded_file($_FILES['myimage']['tmp_name'], "$folder".$_FILES["myimage"]["name"]);

//get the id from the database to send it back again
$unam = $_SESSION['uname'];
$sql = "select * from retailer where username = '$unam' ";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$id = $row['r_id'];//the auto increment id

//take the varibles from the form
$type = $_POST['type'];
$color = $_POST['color']; 
$cost = $_POST['cost'];
$quantity = $_POST['quantity'];
$material = $_POST['material'];
$unam = $_SESSION['uname'];

//do this to confirm if everything is okay
/*
echo $type;
echo $color;
echo $cost;
echo $quantity;
echo $material;
echo $upload_images;
echo $folder;
echo $unam;
echo $id;
*/

$sql = "insert into furniture(type_of_furniture,color,cost,quantity,material,imagename,imagepath,ret_id)values
							('$type','$color','$cost','$quantity','$material','$folder','$upload_images','$id')";
$result = $conn->query($sql);
header("Location: ../home.php?msg=usc");

