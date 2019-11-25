<?php

include 'dbh.php';
session_start();

$furniture_id = $_POST['furniture_id'];
$type = $_POST['type'];
$color = $_POST['color'];
$cost = $_POST['cost'];
$quantity = $_POST['quantity'];
$material = $_POST['material'];

$image = $_SESSION['image'];
$upload_images = $_FILES['myimage']['name'];
$folder = '../db_images/';

if( ($upload_images == '') ||($upload_images == null) ){
	$upload_images = $image;
}else{
	$upload_images = $_FILES['myimage']['name'];
	move_uploaded_file($_FILES['myimage']['tmp_name'], "$folder".$_FILES["myimage"]["name"]);
}


		//$sql = "UPDATE furniture SET type_of_furniture = '$type' ,color = '$color' ,quantity='$quantity',material='$material' WHERE furniture_id='$furniture_id' ";
				//UPDATE furniture SET type_of_furniture = 'wood' ,color = 'white' ,quantity='4',material='wool' WHERE furniture_id=1			
		//$result = $conn->query($sql);
		$sql = "UPDATE furniture SET imagepath = '$upload_images',type_of_furniture = '$type', color = '$color',quantity='$quantity',cost='$cost',material='$material', status=1 WHERE furniture_id='$furniture_id'";
		$result = $conn->query($sql);
		echo $result;
		header("Location: uploads.php?message=sucess1");




















