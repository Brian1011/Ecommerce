<?php
	include 'dbh.php';
	session_start();
	$unam = $_SESSION['uname'];

	$item_id = $_POST['id'];

	$sql = " select * from furniture where furniture_id=$item_id ";

	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$furniture_id = $row['furniture_id'];
	$type_of_furniture = $row['type_of_furniture'];
	$color = $row['color'];
	$cost = $row['cost'];				
	$quantity = $row['quantity'];				
	$material = $row['material'];
	$new_image = $row['imagepath'];

	$m = '../db_images/'.$new_image; 	

	$_SESSION['image'] = $new_image;
	$image = $_SESSION['image'];



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

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

	
	<link rel="stylesheet" type="text/css" href="update_furniture_style.css">
	<style type="text/css">
		input[type=submit]{
			
			border:none;
			width:30%;
			margin-top:20px;
			height:40px;
			color:white;
			background-color:#4CAF50;;
			font-size:20px;
		}

		input[type=submit]:hover{
		background-color:green;
		}
	</style>
</head>
<body>
	<header>
		<nav>
				<center><span id='one'>Edit Page</span></center>
			<ul>
				<a href="home.php">Main Menu</a> |
				<a href="includes/logout.php">logout</a> |
				<?php echo 'You are logged in as: '.$unam ?>
			</ul>
		</nav>
	</header>

	
	<section>
		<?php

			if($image == ''){

			?> <img id='output_image' src = 'no_image.jpg' alt='table.jpg' class='image' height='420px' width:700px;/>

			<?php
				}else{

			?>
				<img id='output_image' src = <?php echo $m; ?> alt='table.jpg' class='image' height='420px' width:700px;/>
			<?php } ?>
		
		
		

		<form action="update_database.php" method="post" enctype="multipart/form-data">

			<input type="file" name="myimage" accept="image/*" onchange="preview_image(event)" style="color:white; background-color:green; width:400px;">
			<br><br>


			Furniture Id: <span style="margin-left:150px;"><?php echo $furniture_id ?></span>
			<input type="hidden" name="furniture_id" value=" <?php echo $furniture_id; ?> "><br><br>
			Type of Furniture:
				<select name="type" style="float:right;">
						<option value="<?php echo $type_of_furniture; ?>" style="float:right;"><?php echo $type_of_furniture; ?></option>
						<option value='bed'>Beds</option>
						<option value='table'>Tables</option>
						<option value='couch'>Couch</option>
						<option value='dinning'>Dinning set</option>
					</select>
				<br><br>	
			Color:<input type="text" name="color" value="<?php echo $color; ?>" style="float:right;"><br><br>
			Cost:<input type="text" name="cost" value=" <?php echo $cost; ?>" style="float:right;"><br><br>
			Quantity:<input type="text" name="quantity" value= "<?php echo $quantity; ?>" style="float:right;"><br><br>
			<!--Material:<input type="text" name="material" value=" <?php  echo $material; ?>"><br><br>-->
			Material:
			<select name="material" style="float:right;"><br><br>
						<option value="<?php  echo $material; ?>" style="float:right;"><?php  echo $material; ?></option>
						<option value='wood'>wood</option>
						<option value='glass'>Glass</option>
						<option value='Leather'>Leather</option>
						<option value='cotton'>Cotton</option>
						<option value='cloth'>Cloth</option>
						<option value='Metallic'>Metallic</option>
			</select><br><br>
			<center><input type="submit" value="Update"></center>
			<br><Br>
		</form>

	</section>

	<footer>
		<div>
			Copyright Kenya Furniture 2017
		</div>
	</footer>

</body>
</html>