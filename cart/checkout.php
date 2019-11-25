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
							<h1>Checkout Page</h1>
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
													<hr>
														<H3>PAY VIA MPESA</H3><br>
														<H4><u>Option 1</u></H4>
														<p>1. Open Safaricom  </p>
														<p> 2. Select <b>Mpesa</b></p>
														<p> 3. Select <b>Lipa na Mpesa</b></p>
														<p> 4. Enter paybill number as<b>4440</b></p>
														<p> 5. Enter amount as <b><?php echo $total; ?></b></p>
														<p>6. Enter your pin </p>
														<p>7. Wait for atleast 5 minutes we will process your order</p> 

														<br>	
														<H4><u>Option 2</u></H4>
														<p>1. Click the button below and enter your <b>Mpesa pin</b></p>
															<button type="submit" style="width:150px; background-color: blue;">Pay Via Mpesa</button>
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