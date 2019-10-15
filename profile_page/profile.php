<?php
include '../header/header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta http-equiv="Cache-control" content="no cache">
	<link rel="stylesheet" type="text/css" href="\Ecommerce\beds\beds.css">
	<link rel="stylesheet" type="text/css" href="profile.css">
</head>
<body>

	<div id="main" onclick="color(1);">
		<div id='content'>
			<header>
				<h1>Profile Page</h1>
			</header>

			<section>
				<?php
					if(isset($_SESSION['id'])){
						$new_id = $_SESSION['id'];
						$sql = "SELECT * from customer where user_id = '$new_id' ";
						$result = $conn->query($sql);

						$row = $result->fetch_assoc();

						$user_id = $row['user_id'];
						$fname = $row['fname'];
						$mail = $row['email'];
						$phone = $row['phone'];
						$username = $row['username'];

						?>
						<DIV id='profile_content'>
						<img src="loginuser.png" ><br><br>
						<B>User Id: </B> <?php echo $user_id?><br><br>
						<B>Fullname:</B> <?php echo $fname?><br><br>
						<B>Username: </B> <?php echo $username?><br><br>
						<B>Email: </B> <?php echo $mail?><br><br>
						<B>Phone Number: </B> <?php echo $phone?><br><br>
						

				<?php

					}else{
					
					?>
					<center>
					<P id="warning">Log In to View Your profile</P>
					<img src="\Ecommerce\profile_page\member-not-logged-on.jpg">
					</center>
				<?php
					}
				?>
				</DIV>
			</section>
		</div>
	</div>
</body>
</html>