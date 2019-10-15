<?php
//include the necessary files i.e database connection and header file
include '../header/header.php';

//session_start();
//$_SESSION['cart'];

$_SESSION['prevoius_url'] = $_SERVER['REQUEST_URI'];

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
		
		<link rel="stylesheet" type="text/css" href="\Ecommerce\beds\beds.css">
		<!--This styling is same as the beds.php-->
		<style type="text/css">
				 
		</style>

</head>
<body>

	<div id='main'>
		<div id='content'>
					<header>
							<h1>Couch Page</h1>
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

		
						<?php  
							$sql = "select * from furniture where type_of_furniture ='couch' ";
							$result = $conn->query($sql);

							// I confused the image_name and image_path...mic drop

							//Perform a while loop to loop through the database
							while($row = mysqli_fetch_array($result)){
								$id = $row['furniture_id'];
								$image_path = $row['imagename'];
								$image_name = $row['imagepath'];
								$cost = $row['cost'];
								
							//concat the variables
								$m = '../db_images/'. $image_name; ?>

								
								<div id='whole'>
									<div id="card">
										<a href="\Ecommerce\beds\desc.php?id=<?php echo $id; ?>"><img src = <?php echo $m; ?> alt='table.jpg' class='image'/></a>
										<!--When you Click on the image it redirects you but the button adds to cart--> 
									</div>

									<div id="container">
											<P> ksh <?php echo $cost; ?> </P>

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
						<!--
						<?
						//php echo sizeof ($_SESSION['cart']); 
						//foreach($_SESSION['cart'] as $key => $value)
						//{
						  //echo $key." has the value". $value."<br>";
						//}?>	
						-->
						
					</section>
	</div>
</div>
</body>
</html>