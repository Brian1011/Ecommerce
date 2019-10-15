<?php
//include the databse connection
//include '../dbh.php';
include '../../header/dbh.php';

//take the variables from the form
$fullname = $_POST['fullname']; 
$mail = $_POST['mail']; 
$location = $_POST['location']; 
$phone = $_POST['phone']; 
$uname = $_POST['uname']; 
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if(empty($fullname)){
	header("Location: ../signup.php?error=empty");
	exit();
}
if(empty($mail)){
	header("Location: ../signup.php?error=empty");
	exit();
}
if(empty($location)){
	header("Location: ../signup.php?error=empty");
	exit();
}
if(empty($uname)){
	header("Location: ../signup.php?error=empty");
	exit();
}
if(empty($pass1)){
	header("Location: ../signup.php?error=empty");
	exit();
}
if(empty($pass2)){
	header("Location: ../signup.php?error=empty");
	exit();
}
else{
$sql = "select username from retailer where username='$uname' ";
$result = $conn->query($sql);
$check = mysqli_num_rows($result);

	if($check > 0){
		//check if usernames macth in database
		header("Location: ../signup.php?error=username");
		exit();
	}else{

		//check email
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			header("location: ../signup.php?error=mail");
			exit();
		}else{
				//check password length
				if(strlen($pass1)<5){
						header("location: ../signup.php?error=passlength");
						exit();
				}else{
					//check password if they match
					if($pass1 != $pass2){
					header("location: ../signup.php?error=passmatch");
					exit();
				}else{
					$encrypted_password = password_hash($pass1,PASSWORD_DEFAULT);
					$sql = "insert into retailer(fname,email,location,phone_no,username,password) 
					values('$fullname','$mail','$location','$phone','$uname','$encrypted_password')";

					//send data
					$result = $conn->query($sql);

					//take us somewhere
					header("location: ../login.php?message=sucess");
					}
			}
		}

		
}

}

	

/*
//do this for testing purposes to see the information
echo $fullname."<br>";
echo $mail."<br>";
echo $location."<br>";
echo $phone."<br>";
echo $uname."<br>";
echo $pass1."<br>";
echo $pass2."<br>";
*/

//create sql statement to insert data into the database

/*
insert into retailer(fname,email,location,phone_no,username,password) values('am','bm','location','phone','uname','pass1')
*/