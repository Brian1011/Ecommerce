<?php
	include 'dbh.php';

	//session_start();
	//$_SESSION['prevoius_url'] = $_SERVER['HTTP_REFERER'];
	session_start(); // starts the session
	$_SESSION['prevoius_url'] = $_SERVER['REQUEST_URI'];


	//$_SESSION['cart'] = array();//cart

	$cust_id=0;
	$message = '';
	$dfullname = '';

	//session_start();
	//$cust_id = $_SESSION['id'];
		if(isset($_SESSION['id'])){
			$cust_id = $_SESSION['id'];
			$log = $cust_id;
			$message = "Logged in as: ";	
			$sql = "SELECT * from customer where user_id = '$cust_id' ";
			$result = $conn ->query($sql);

			$row = $result->fetch_assoc();
			$dfullname = $row['fname'];

			$_SESSION['customer_id'] = $row['user_id'];
			$_SESSION['logout_time'] = $row['logout'];


		}else{
			$message = "You are not logged in";
			$cust_id=0;
		}												
												
?>

<?php
	include 'C:\xampp\htdocs\Ecommerce\retailer_page\dbh.php';
?>

<!DOCTYPE html>
<!--
	THIS IS THE SKELETON PAGE
-->
<html>
<head>
	<title></title>
	<meta http-equiv="Cache-control" content="no cache">
	<script type="text/javascript" src="\Ecommerce\main.js"></script>
	<link rel="stylesheet" type="text/css" href="\Ecommerce\common_styling\style.css">
	<link rel="stylesheet" type="text/css" href="\Ecommerce\header\header.css">
    <style>
    .p{
    	text-decoration:none;
    	color:white;
    	text-align:right;
    	padding-left:10px;
    	cursor:pointer;	
    }
    </style>
    <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        //openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</head>
<body onload="openNav(); ">
<!--LOGIN IN FORM-->
<div id="id01" class='modal'>
	<FORM class="modal-content animate" action="\Ecommerce\customer_login\customer_login.php" method="post">
		<div class="imgcontainer">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		</div>

		<div class="container">
				<?php
				$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
					if(strpos($url, 'message=sucess')){
						echo "
								<script>
								document.getElementById('id01').style.display='block';
								</script>
							";
							echo "<p style='color:Blue; text-align:center;'>You have Sucessfully Registered. Login to verify your credentials</p>";

					}else if(strpos($url,'error=incorrect')){
						echo "
								<script>
								document.getElementById('id01').style.display='block';
								</script>
							";
							echo "<p style='color:Blue; text-align:center;'>Password or Username is incorrect</p>";
					}

				?>
			Username: <br><br> <input type="text" name="uname" required> <br><br>
			Password: <br><br> <input type="password" name="pass" required><br><br>
			<button type="submit" style="background-color:#4CAF50;">Login</button>
		</div>

		<div class="container" style="background-color:#f1f1f1">
		      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		</div>
	</FORM>
</div>
<!--LOGIN-->

<!--Sign up-->
	<div id='signup1' class="signup">
		<form class='signup2' action="\Ecommerce\customer_login\customer_signup.php" method="post">
			<div class="imgcontainer">
				<span onclick="document.getElementById('signup1').style.display='none'" class="close" title="Close Modal">&times;</span>
			</div>

			<div class="signup3">
				<!--Remember customer id is automatic-->
				<h1>SIGNUP</h1>
					<br>
					<?php
						//GET URL
						$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
						if(strpos($url,'error=username')!==false){
							echo "
								<script>
								document.getElementById('signup1').style.display='block';
								</script>
							";
							echo "<p style='color:red; text-align:center;'>Sorry Username Already Exists</p>";
						}else if(strpos($url,'error=mail')!==false){
							echo "
								<script>
								document.getElementById('signup1').style.display='block';
								</script>
							";
							echo "<p style='color:red; text-align:center;'>Invalid Email Adress</p>";
						}else if(strpos($url,'passmatch')!==false){
							echo "
								<script>
								document.getElementById('signup1').style.display='block';
								</script>
							";
							echo "<p style='color:red; text-align:center;'>Your Passwords Do not match</p>";
						}else if(strpos($url,'passlength')!==false){
							echo "
								<script>
								document.getElementById('signup1').style.display='block';
								</script>
							";
							echo "<p style='color:red; text-align:center;'>Your Password should be more than 4 characters</p>";
						}

					?>
				<br>
				<!--<input type="hidden" name="referer" value="<?php=$_SERVER['HTTP_REFERER']?>">-->
				<input type="text" name="fullname" placeholder="Enter Full Name" required><br><br>
				<input type="text" name="mail" placeholder="Enter Your Email Adress" recquired><br><br>
				<input type="text" name="phone" placeholder="Phone Number" recquired><br><br>
				<input type="text" name="uname" placeholder="Username" required><br><br>
				<input type="password" name="pass1" placeholder="Password" required><br><br>
				<input type="password" name="pass2" placeholder="Re-type Password"><br><br>
				<button type="submit">Signup</button><br><br>
			</div>

		</form>	
	</div>
	

<!--Signup-->
		<div id="one">
				<div id="head">
					
<!--SEARCH BUTTON,SEARCH BAR,sidebar-->
							<div class='r'>
								<div>
									<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
								</div>
							</div>

							<div class='ra'>
								<div>
									<form action="\Ecommerce\header\search.php" method="post">
										<input type="text" name="search" placeholder="Search...">
										<input type="submit" name="search_button" value="Search" size="50">
									</form>
								</div>
							</div>


							<div class='la'>
								<div>
									
											<div class="dropdown">
												<button  class="dropbtn">Advanced Search</button>
													<div id="myDropdown" class="dropdown-content">
													<form action="\Ecommerce\header\advanced_search.php" method="post">
														Search For specific money Range:<br><br>
														From:<br><input type="text" name="from" value="0"><br><br>
														To:<br><input type="text" name="to" value="70000"><br><br>
														<input type="submit" name="search_button" Value="search"><br><br>
													</form>
													</div>
											</div>

											<input type="button" name="sign" value='Sign up' onclick="document.getElementById('signup1').style.display='block'">
											<!--display cart here-->

											<?php
												if($cust_id==0){
												?>
												<input type="button" name="login" value='login' onclick="document.getElementById('id01').style.display='block'">
												<?php	
											}else{

												?>
													<a href="\Ecommerce\customer_login\logout.php"><input type="button" name="login" value='logout'></a>
													
														<span style="margin-left:10px;">
															<?php 
																	echo $message;
																	echo $dfullname;
																	//echo $cust_id;
																}

												?>
												</span>
												<a href="\Ecommerce\cart\view_cart.php">
												<img src="\Ecommerce\header\cart.png" style="width:30px; height:30px; background-color:green; margin-right:20px; float:right; margin-top:20px;">
												<?php
														

													$items = 0;
														if(isset($_SESSION['id'])){
														$logout_time = $_SESSION['logout_time'];
														$customer_id = $_SESSION['customer_id'];
														$sql = "SELECT product_id FROM cart WHERE cust_id='$customer_id' and cust_logout='$logout_time' ";
														$result = mysqli_query($conn, $sql);
														$items = mysqli_num_rows($result);
													}
														
												?>
												</a>
												<p style="margin-right:20px; float:right; margin-top:20px;"><?php echo $items;?></p>
												
												



								</div>
							</div>

						</div>
								

				</div>

				<div id="mysidenav" class="sidenav">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				  <a href="\Ecommerce\index.php">Home</a>
				  <!--<a href="\Ecommerce\tables_page\table.php">Tables</a>-->
				  <!--<a href="\Ecommerce\couch_page\couch.php">Couch</a>-->
				  <a href="\Ecommerce\dinning_page\dinning.php">Kitchen </a>
				  <a href="\Ecommerce\beds\beds.php">Agriculture</a>
				  <a href="\Ecommerce\profile_page\profile.php">Profile</a>
				</div>
		</div>
</body>
</html>