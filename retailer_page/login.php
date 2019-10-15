<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="signup.css">
		<style type="text/css">
			#left_side{
			background-image:url("image.jpg");
			}
			#top{
				color:white;
			}
		</style>
</head>
<body>
	<!--lefts side contains pics-->

		<div id='left_side'>
			<pre><h1 id='top'>  Build Your Business Right<br> Here <br> </h1></pre>
			<pre><h1 id='bottom'> </h1></pre>
		</div>

<!--RIght side contains sigup form-->
		<div id='right_side'>
			<form action="includes\login1.inc.php.php" method="post">
				<h1>User Login</h1>
				<br>
<?php
	//get the url
	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	
	//checking string position
	if(strpos($url,'error=empty')){
		echo "<p style='color:red;'>Username or Password are incorrect </p>";
	}else if (strpos($url,'message=sucess')) {
		echo "<p style='color:white;'>Welcome To our System. Sign in To verify your credentials</p>";
	}else if(strpos($url,'error=wrongpassword')){
		echo "<p style='color:red;'>Wrong Password</p>";
	}else if(strpos($url,'msg=slogout')){
		echo "<p style='color:white;'>You Have sucessfully loged out <a href='..\index.php'>Home</a></p>";
	}

?>
				<br>
				<hr>
				<br>
				<div id='image_frame'>
					<img src="loginuser.png" class='login_images'>
				</div>	
				<br>
				<input type="text" name="uname" placeholder="Username"><br><br>
				<input type="password" name="pass1" placeholder="Password"><br><br>
				<input type="submit" name="submit" value="Login"><br><br>
			</form>
</body>
</html>