<?php

//select from database include the database connection
include '../../header/dbh.php';

$uname = $_POST['uname'];
$pass1 = $_POST['pass1'];

$sql = " select * from retailer where username='$uname' ";
//this is for other purposes ...pick up the id

//pick auto_increment id
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$hash_password = $row['password'];
$id = $row['r_id'];

//decrypt
$hash = password_verify($pass1, $hash_password);

if($hash == 0){
	//echo $hash_password;
	//echo $pass1;
	header("location: ../login.php?error=empty");
	exit();
}else{
		$sql = " select * from retailer where username='$uname' and password='$hash_password' ";
		$result = $conn->query($sql);

		//check if password is correct
		if(!$row = $result->fetch_assoc()){
			
			echo 'Your password or username is incorrect';
			//return him to the login page to type in the information again
			//header("location: ../login.php?error=wrongpassword");
			//exit();

		}else{
			//after this is done take us to home page and carry this info to display on the othe page
			session_start();
			$_SESSION['uname'] = $uname;
			header("location: ../home.php?$id");
		}

}
