<?php
include 'dbh.php';
session_start();
$unam = $_SESSION['uname'];

echo $unam;

$item_id =$_POST['id'];
echo $item_id;

$sql = "DELETE FROM furniture WHERE furniture_id =$item_id ";

$result = $conn->query($sql);

header("Location:uploads.php?message=success");





























