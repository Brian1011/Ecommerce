<?php
	//session_start();
include '../header/header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="\Ecommerce\beds\beds.css">
</head>
<body>
		<div id='main'>
			<div id='content'>
					<header>
							<h1>Cart Page</h1>
					</header>

					<section>
					<?php 
						if(isset($_SESSION['id'])){
							$logout_time = $_SESSION['logout_time'];
							$customer_id = $_SESSION['customer_id'];
							
							$sql = "SELECT product_id FROM cart WHERE cust_id='$customer_id' and cust_logout='$logout_time'";
							$result = $conn->query($sql);

							if(!$row = $result->fetch_assoc()){
								echo '<center><H1>No items present in the cart<H1></center>';
								echo "<center><img src='\Ecommerce\cart\clear_shopping_cart1600.png' style='width:300px; height:300px;'></center>";
							}else{
								$sql1 = "SELECT * FROM cart WHERE cust_id='$customer_id' and cust_logout='$logout_time'";
								$result1 = $conn->query($sql1);

								?>
								<center>
								<table style="margin-top:20px;">
									<th>Item </th>
									<th>Type of Furniture</th>
									<th>Cost per item</th>
									<th>Quantity</th>
									<th>Total Price</th>
									<th>Remove item</th>
									
								<?php
								while($row = mysqli_fetch_array($result1)){
										$product_id = $row['product_id'];
										$quantity = $row['quantity'];
										$total = 0;

										//run another select statement on the other side of town as it loops
											$sql2 = "select * from furniture where furniture_id ='$product_id' ";
											$result = $conn->query($sql2);
											//get the rows we need
												while($row = mysqli_fetch_array($result)){
													 $image_name = $row['imagepath'];
													 $cost = $row['cost'];
													 $type_of_furniture = $row['type_of_furniture'];

													 $m = '../db_images/'. $image_name; 
													 $total_per_item = $quantity * $cost; 
													 $total = $total+$total_per_item;
													 ?>

											<tr>
												<td><img src="<?php echo $m; ?>" style="width:200px; height:150px;"></td>
												<td><?php echo $type_of_furniture; ?></td>
												<td><?php echo $cost; ?></td>
												<td><?php echo $quantity; ?></td>
												<td><?php echo $total_per_item; ?></td>
												<td>
													<form action='remove_item.php' method="post">
														<input type="hidden" name="remove_id" value="<?php echo $product_id; ?>">
														<button type="submit" style="width:100px; background-color: red;">Remove Item</button>
													</form>
												</td>
											</tr>

								<?php }?>		

									<?php
								}?>
								</table>
								</center>
									<br><br>
											<center>
												<h1 style="margin-bottom:10px;">Total price in ksh:<?php echo $total; ?>
												</h1>
												
													<?php
														if($total == 0){
													?>
														
													<?php
														} else {
													?>
														<a href="\Ecommerce\cart\checkout.php">
															<button type="submit" style="width:150px; background-color: blue;">Checkout</button>
														</a>
													<?php
														}
													 ?>
												
											</center>
								<?php
							}
					?>

					<!--show cart and the item-->

					<?php }else{ ?>
					<!--he is not logged in-->
					<center>
						<P id="warning" style="font-size:30px; color:red;">Log In to add items to cart</P>
						<img src="\Ecommerce\profile_page\member-not-logged-on.jpg">
					</center>


					<?php } ?>
			</div>
		</div>

</body>
</html>