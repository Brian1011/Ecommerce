<?php
session_start();
include '../header/dbh.php';
//include 'dbh.php';

//recieve data
$uname = $_POST['uname'];
$pass1 = $_POST['pass'];

/*
//Cofirm before you proceed
echo $uname;
echo $pass1;
*/


$sql = " SELECT * from customer where username='$uname' "; 
$result = $conn->query($sql);
//select the row and retrieve the encrypted password

$row = $result->fetch_assoc();
//"SELECT * from customer where username='$uname' and password='1234as'"; 

$hash_password = $row['password'];
$id = $row['user_id'];

//decrpty
$hash = password_verify($pass1,$hash_password);

//check url
//$new_url = '';
if(isset($_SESSION['prevoius_url'])){
	$url = $_SESSION['prevoius_url'];
}else{
	$url = "..\Ecommerce\index.php";
}

echo $hash; //- prints 1 as true or 0 as false

	if($hash == 0){
		echo "incorrect password";
		header("Location:".$url."?error=incorrect");

	}else{
			$sql = "SELECT * from customer where username='$uname' and password='$hash_password'";
			$result = $conn->query($sql);
				if(!$row = $result->fetch_assoc()){
					echo "Your Password or Username is Incorrect";
					header("Location:".$url."?error=incorrect");
				}else{
					echo "Welcome";
					//session_start();
					$_SESSION['id'] = $id;
					
					header("Location: ".$url."?$id");
					echo "<br>";
					echo $url;
				}
	}
	



