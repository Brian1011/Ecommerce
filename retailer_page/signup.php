<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="signup.css">
	<style type="text/css">
		#left_side{
			background-image:url("next-level.jpg");
			}
		#bottom{
			color:Blue;
		}
		#top{
			color:White;
		}
	</style>
</head>
<body>



<!--lefts side contains pics-->

		<div id='left_side'>
			<pre><h1 id='top'>    Take Your  Business <br> </h1></pre>
			<pre><h1 id='bottom'>            To the next   level</h1></pre>
		</div>

<!--RIght side contains sigup form-->
		<div id='right_side'>
			<form action="includes\signup1.inc.php.php" method='post'>
				<h1>Sign Up</h1>
<?php
//get the string url
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//checking string position
if(strpos($url,'error=empty')!== false){
	echo "<p style='color:red'>Fill out all fields </p>";

//check if username are the same
}else if(strpos($url,'error=username')!==false){
	echo "<p style='color:red'>Username Already Exists</p>";

}
//check if email is valid
else if(strpos($url,'error=mail')!==false){
	echo "<p style='color:red'>Invalid email address</p>";
}
else if(strpos($url,'passmatch')!==false){
	echo "<p style='color:red'>Your Passwords Do not match</p>";
}else if(strpos($url,'passlength')!==false){
	echo "<p style='color:red'>Your Passwords is too short</p>";
}
?>
				<br>
				<hr>
				<br>
				<input type="text" name="fullname" placeholder="Full name"><br><br>
				<input type="text" name="mail" placeholder="Email"><br><br>
				<input type="text" name="location" placeholder="Location"><br><br>
				<input type="text" name="phone" placeholder="Phone Number*"><br><br>
				<input type="text" name="uname" placeholder="Username*"><br><br>
				<input type="password" name="pass1" placeholder="Password*"><br><br>
				<input type="password" name="pass2" placeholder="Re-type Password"><br><br>
				<input type="submit" name="submit"><br><br>
				Already have an Account <a href="login.php">Click here</a>
			</form>
		</div>
</body>
</html>