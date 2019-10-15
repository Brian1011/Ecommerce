<?php
//after the item is selected
include '../header/header.php';

//get id from any page linked to this
if ($_GET['id']){
	$id = $_GET['id'];
}



$sql = "select * from furniture where furniture_id = '$id' ";
//$result = $conn->query['$sql'];
$result = $conn->query($sql);

//fetch each and every column since each column is important
$row = $result->fetch_assoc();
//var_dump($result);
//select every column
$type = $row['type_of_furniture'];
$color = $row['color'];
$cost = $row['cost'];
$quantity =$row['quantity'];
$material = $row['material'];
$imagename = $row['imagename'];
$imagepath = $row['imagepath'];


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<link rel="stylesheet" type="text/css" href="beds.css">
</head>
<body>

	<div id='main'>
		<div id='content'/>
		<header>
				<h1>Description Page</h1>
		</header>
			<p style="color: black;">
					<?php 
						/*echo $id.'<br>';
						echo $type.'<br>';
						echo $color.'<br>';
						echo $cost.'<br>';
						echo $quantity.'<br>';
						echo $material.'<br>';
						echo $imagename.'<br>';
						echo $imagepath.'<br>';
						*/
						$m = '../db_images/'.$imagepath;
					?>
						<div id='one'>
							<!--image-->
							<img src=" <?php echo $m; ?> " style="width:100%; height:100%;">
						</div>

						<div id='two'>
							<!--info-->
							Furniture id: <?php echo $id; ?> <br><br>
							Color: <?php echo $color; ?> <br><br>
							Cost: <?php echo $cost; ?>	<br><br>
							Material: <?php echo $material?> <br><br><br>
							<form action="..\cart\cart_processing.php" method="post">
											<input type="hidden" name="new_id" value='<?php echo $id; ?>'>
											<center><button type="submit" style="width:200px;">Add to cart</button></center>
										</form>	

						</div>

						
			</p>
		</div>
</div>
</body>
</html>