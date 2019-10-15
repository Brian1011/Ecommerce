<?php
include 'dbh.php';
//include 'home.php';

session_start();
$unam = $_SESSION['uname'];

//echo $unam;
$sql = "SELECT * FROM retailer WHERE username = '$unam' ";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$id = $row['r_id'];
$fname = $row['fname'];

//echo $id;

//am using foreign keys and primary keys
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="update_furniture_style.css">
	<style type="text/css">
		
	section{
		height:2250px;
	}
	</style>
</head>
<body>
<header>
		<nav>
				<center><span id='one'>My Uploads</span></center>
			<ul>
				<a href="home.php">Main Menu</a> |
				<a href="includes/logout.php">logout </a> |
				<?php echo 'You are logged in as: '.$unam ?>
			</ul>
		</nav>
	</header>

	<section>
	<?php
		$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		if(strpos($url,'message=success')){
			echo "<p style='color:White'; font-size:30px;><b>Data Has been Sucessfully Erased</b></p>";
		}else if(strpos($url,'message=sucess1')){
			echo "<p style='color:White' font-size:70px;><b>Data Has been Sucessfully Updated</b></p>";
		}
	?>
		<br><br>
		<table>
		<tr>
			<th>Furniture Id</th>
			<th>Furniture Type</th>
			<th>Color</th>
			<th>Cost</th>
			<th>Quantity</th>
			<th>Material</th>
			<th>Delete</th>
			<th>Update</th>
		</tr>
			<?php
				$sql2 = "SELECT * FROM furniture WHERE ret_id = '$id' ";
					$result = $conn->query($sql2);

					while($row = $result->fetch_assoc()){
						$furniture_id = $row['furniture_id'];
						$type_of_furniture = $row['type_of_furniture'];
						$color = $row['color'];
						$cost = $row['cost'];
						$quantity = $row['quantity'];
						$material = $row['material'];
						?>

						<tr>
							<td><?php echo $furniture_id?></td>
							<td><?php echo $type_of_furniture ?></td>
							<td> <?php echo $color ?> </td>
							<td><?php echo $cost ?> </td>
							<td> <?php echo $quantity ?> </td>
							<td> <?php echo $material ?></td>
							<td>
								<form action="delete_furniture.php" method="post">
									<input type="hidden" name="id" value="<?php echo $furniture_id ?>">
									<input type="submit" name="delete" value="Delete" style="background-color:Red; color:white; font-size:15px; border:0px; padding:10px; height:100%; width:100%;">
								</form>
							</td>
							<td>
								<form action="update_furniture.php" method="post">
									<input type="hidden" name="id" value="<?php echo $furniture_id ?>">
									<input type="submit" name="dlete" value="Edit" style="background-color:Blue; color:white; font-size:15px; border:0px; padding:10px; height:100%; width:100%;"/>
								</form>
							</td>
						</tr>

			<?php } ?>
		</table>
	</section>

	<footer>
		<div>
			Copyright Kenya Furniture 2017
		</div>
	</footer>
</body>
</html>





