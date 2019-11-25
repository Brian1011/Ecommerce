<?php
include '../header/header.php';
//include '../header/dbh.php';
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
							<h1>Agriculture Page</h1>
					</header>

					<section>
					<?php
						$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
						$m=''; 
						if(strpos($url, 'error=logged')){
								$m = 'You have to login to add items to cart';
								//echo "<p style='color:Red; text-align:center; font-size:30px;'>You have to login to add items to cart</p>";
						}else if(strpos($url, 'm=sucess')){
								$m='';
								//echo "<p style='color:Blue; text-align:center; font-size:30px;'></p>";
						}
						echo "<p style='color:Red; text-align:center; font-size:30px;'>$m</p>";
					?>
		<!--
			<img src= "\Ecommerce\db_images\927d5c119a8b14e4de25b882829efd98.png" width=400px height=400px>
	-->
						<?php  
							//$sql = "select * from furniture where type_of_furniture ='bed' ";
							$sql = "select * from furniture where type_of_furniture ='agriculture' ";
							$result = $conn->query($sql);

							// I confused the image_name and image_path...mic drop

							while($row = mysqli_fetch_array($result)){
								$id = $row['furniture_id'];
								$image_path = $row['imagename'];
								$image_name = $row['imagepath'];
								$cost = $row['cost'];
								
							//concat the variables
								$m = '../db_images/'. $image_name; ?>

								
								<div id='whole'>
									<div id="card">
										<a href="desc.php?id=<?php echo $id; ?>"><img src = <?php echo $m; ?> alt='table.jpg' class='image'/></a>
										<!--When you Click on the image it redirects you but the button adds to cart--> 
									</div>

									<div id="container">
											<P> ksh <?php echo $cost; ?> </P>
											<!--place an anchor tag around this button, add to a virtual kart-->
														
												<form action="..\cart\cart_processing.php" method="post">
											<input type="hidden" name="new_id" value='<?php echo $id; ?>'>
											<button type="submit">Add to cart</button>
										</form>	

											<!--you use the php tag to display-->
									</div>									
								</div>
								
							<?php }
//wrap the php in a div to display the images then to display price
						?>
					</section>
	</div>
</div>
</body>
</html>