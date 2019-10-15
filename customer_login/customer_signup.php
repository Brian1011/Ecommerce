<?php
session_start();
//include the database connection
//include 'dbh.php';
include '../header/dbh.php';


$fullname = $_POST['fullname'];
$mail = $_POST['mail'];
$phone = $_POST['phone'];
$uname = $_POST['uname'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$referer = $_POST['referer'];

//confirmation is important
/*
echo $fullname."<br>";
echo $mail."<br>";
echo $phone."<br>";
echo $uname."<br>";
echo $pass1."<br>";
echo $pass2."<br>";
*/

//check if the username exists in the database
$sql = "select username from customer where username='$uname'";
$result = $conn->query($sql);
$check = mysqli_num_rows($result);

if(isset($_SESSION['prevoius_url'])){
	$url = $_SESSION['prevoius_url'];
}else{
	$url = "..\Ecommerce\index.php";
}

//ceheck if username is the same
if($check>0){
	//RETURN THE USER TO THE CURRENT PAGE
	header("Location:".$url."?error=username");
	exit();
		}else{
			//check email
			if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
					header("Location:".$url."?error=mail");
					exit();
				}else{
					//check password length
					if(strlen($pass1)<4){
						header("Location:".$url."?error=passlength");
						exit();
						}else{
							//check if password match
							if($pass1!=$pass2){
								header("Location:".$url."?error=passmatch");
								exit();
							}else{
								//everything is okay encrypt and send to database
								$encrypted_password = password_hash($pass1,PASSWORD_DEFAULT);
								
								$sql = "INSERT INTO customer(fname,email,phone,username,password)
								values('$fullname','$mail','$phone','$uname','$encrypted_password')";
								$result = $conn->query($sql);

								echo $url;
								header("Location:".$url."?message=sucess");
							}
						}		
				}				
		}