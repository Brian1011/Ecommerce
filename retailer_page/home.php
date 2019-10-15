<?php
//get the unique id/ username form the login page
include 'dbh.php';
session_start();
$unam = $_SESSION['uname'];

//select the info from the database
$sql = "select * from retailer where username = '$unam' ";
$result = $conn->query($sql);

//fetch each and every column since each column is important
$row = $result->fetch_assoc();
//var_dump($result);

$id = $row['r_id'];//the auto increment id
$fname = $row['fname'];//full name of logged user
$email = $row['email']; //email
$location = $row['location'];
$phone = $row['phone_no'];
							//the username is the uname

?>

<!DOCTYPE html>
<html>
<script type="text/javascript">
	//I prefer it being external ...upload an image and see it
	function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<style type="text/css">

		.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav p {
    text-decoration: none;
    font-size: 25px;
    color: white;
    display: block;
    transition: 0.3s;
}
.sidenav h2{
	font-size: 25px;
	color: white;
	transition: 0.3s;
	text-align:center;
}
.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

#sucess_image{
	width:400px;
	height:300px;
	margin:auto;
}

#output_image
{
 max-width:400px;
 width:100%;
 height:100%;
}
#button_page{
	border:0px;
	background-color:green;
	color:white;
	height:30px;
	width:150px;
}
.button_page{
	border:0px;
	background-color:black;
	color:white;
	height:30px;
	width:90px;
}
	</style>
	<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "50%";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
</head>
<body>
<!--PROFILE PAGE-->
<?php
	if(isset($_SESSION['uname'])){


?>
		<div id='mySidenav' class='sidenav'>
			 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			 <h2><u>My profile</u></h2>
			 <br><br>
			 <p>
				 <?php echo'You are logged in as: '.$unam.'<br><br>'?>
				 <?php echo'Name: '.$fname.'<br><br>'?>
				 <?php echo 'Phone Number: '.$phone.'<br><br>'?>
				 <?php echo 'Email Adress: '.$email.'<br><br>'?>
			</p>
		</div>

	<!--PROFILE PAGE-->
		<header>
			<nav>
					<center><span id='one'>Work From Home</span></center>
				<ul>
					<a href="#" onclick="openNav()">&#9776;> Profile</a> |
					<a href="uploads.php">All uploads</a> |
					<a href="includes/logout.php">logout</a> |
					<?php echo 'You are logged in as: '.$unam ?>
				</ul>
			</nav>
		</header>

		<section>
			<h1>Upload an Item</h1>
				<?php
	$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	if(strpos($url,'msg=usc')!== false){
		echo "<p style='color:white'>File has been sucessfully uploaded</p>";

	//check if username are the same
	}

				?>
			<form method="POST" action="includes/home.inc.php" enctype="multipart/form-data">
				<table border='2px' cellspacing="2px">
					<tr>
						<td id='sucess_image'>
							<img id="output_image"/>
						</td>
					</tr>
				</table>

				<br><br>
				<!--THE BUTTON THAT UPLOADS THE IMAGE-->
				<input type="file" name="myimage" accept="image/*" onchange="preview_image(event)" style="color:white; background-color:green; width:400px;">
				<br><br>
				
					Furniture Type <br>
					<select name="type">
						<option value='bed'>Beds</option>
						<option value='table'>Tables</option>
						<option value='couch'>Couch</option>
						<option value='dinning'>Dinning set</option>
					</select>
				<br><br>

				Color<br> <input type="text" name="color" placeholder='color'><br><br>
				Cost<br> <input type="text" name="cost" placeholder='cost per single unit'><br><br>
				Qauntity<br> <input type="text" name="quantity" placeholder="quantity available"><br><br>
				Material <br>
				<!--<br> <input type="text" name="material" placeholder="material"><br><br>-->
					<select name="material">
						<option value='wood'>wood</option>
						<option value='glass'>Glass</option>
						<option value='Leather'>Leather</option>
						<option value='cotton'>Cotton</option>
						<option value='cloth'>Cloth</option>
						<option value='Metallic'>Metallic</option>
					</select>
					<br><br>
				<input type="submit" name="upload" value="Upload" id='button_page'>
			</form>
		</section>

		<footer>
			<div>
				Copyright Kenya Furniture 2017
			</div>
		</footer>
<?php }else{

	?>
		<p>You Have to login </p><br><br>
		<a href="login.php">Login</a>

<?php	} ?>
</body>
</html>