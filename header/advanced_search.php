<?php
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="\Ecommerce\beds\beds.css">
	<style type="text/css">
		.results{
			width:80%;
			margin: 0 auto;
			position:center;
			text-align:center;
		}
		
	</style>
</head>
<body>

	<div id='main'>
		<div id='content'/>
					<header>
							<h1>Search Price Results Page</h1>
					</header>

					<section>
						<?php
if(isset($_POST['search_button'])){
			

							$from = $_POST['from'];
							$to = $_POST['to'];
							$sql = "select * from furniture where cost between '$from' and '$to'";

			$result = mysqli_query($conn, $sql);
			$queryResult = mysqli_num_rows($result);

			if($queryResult > 0){
				echo "There are " .$queryResult." results <br>";
					while ($row = mysqli_fetch_assoc($result)){
						$id = $row['furniture_id'];
						$image_path = $row['imagename'];
						$image_name = $row['imagepath'];
						$cost = $row['cost'];

						$m = '../db_images/'. $image_name; ?>


									<div id='whole'>
										<div id="card">
											<a href="\Ecommerce\beds\desc.php?id=<?php echo $id; ?>"><img src = <?php echo $m; ?> alt='table.jpg' class='image'/></a>
											<!--When you Click on the image it redirects you but the button adds to cart--> 
										</div>

										<div id="container">
												<P> ksh <?php echo $cost; ?> </P>
												<button>Buy Now</button>
												<!--you use the php tag to display-->
										</div>									
									</div>
									
								<?php } 				
			}else{
					
					?>	
					<div class="results">
						
							 <img src="no.jpg" style="width:400px; height:400px"><br>
							 <h1 style="color:red">There are no Results matching your search </h1>
						
						
					</div>
				<?php

			}
			}
			

		?>
		</section>
		
	</div>
</div>
</body>
</html>