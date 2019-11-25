<?php
include 'header/header.php';
?>

<!DOCTYPE html>
<!--
	THIS SHOULD BE THE MAIN PAGE/WELCOME PAGE
-->

<html>
<head>
	<title></title>
	<meta http-equiv="Cache-control" content="no cache">
	<script type="text/javascript" src="\Ecommerce\main.js"> </script>
		<link rel="stylesheet" type="text/css" href="\Ecommerce\common_styling\style.css">
		<link rel="stylesheet" type="text/css" href="\Ecommerce\index1.css">
		<style type="text/css">
			#myBtn {
								  display: none;
								  position: fixed;
								  bottom: 20px;
								  right: 30px;
								  z-index: 99;
								  border: none;
								  outline: none;
								  background-color: blue;
								  color: white;
								  cursor: pointer;
								  padding: 15px;
								  border-radius: 10px;
								  width:70px;
								  margin-right:10px;
								}

								#myBtn:hover {
								  background-color: #555;
								}
		</style>
<script>
			// When the user scrolls down 20px from the top of the document, show the button
			window.onscroll = function() {scrollFunction()};

			function scrollFunction() {
			    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			        document.getElementById("myBtn").style.display = "block";
			    } else {
			        document.getElementById("myBtn").style.display = "none";
			    }
			}

			// When the user clicks on the button, scroll to the top of the document
			function topFunction() {
			    document.body.scrollTop = 0;
			    document.documentElement.scrollTop = 0;
			}
</script>


</head>
<body onload='color(2);'>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<!--div id main is needed in every page to format the body-->
		<div id='main'>
<!--login page-->

<!--LOGINpage-->

<!--Signup Page-->


<!--Signup page-->
			<div id='content'/>
					<header>
						<div id="tags">
							<a href="#home"> Home</a>
							<a href="#about">About us</a>
							<a href="#contact">Contact us</a>
							<a href="#product">Products</a>
							<a href="#work">Work With us</a>
						</div>
					</header>

					<!--section or meat -->
					<section>
						<article id='home'>
							<h1>"As we evolve, our homes should, too"
								<br><br>
								<br>
								<br><br>By Suzanne Tucker
							</h1>
						</article>
				<hr>
						<article id='about'>
							<h1> About Us </h1>

							<div id='about1'>
								<img src="images\shop.png" class='about_images'>
								<br>
								<h3>Who We Are</h3>
								We are an online ecommerce shop that offers variety of juakali products to our customers and allow them to purchase online
								<!--an image goes here-->
							</div >

							<div id='about2'>
								<img src="images\Customers.png" class='about_images'>
								<br>
								<h3>To Our Customers</h3>
								We seek to offer quality service and products to our customers and their benefit is also our benefit.
							</div >

							<div id='about3'>
								<img src="images\partners.png" class='about_images'>
								<br>
								<h3>To Our Parteners</h3>
								We also promote the juakali industry by allowing them to sell their products online platform.
							</div>
						</article>
				<hr>
						<article id='product'>
							<h1>Products</h1>
							<p>We offer the following categories of products with plenty of variety in each category</p>
							<!--IMAGES TO REPRESENT EACH ITEM-->
							<div id='prod1'>
								<a href="\Ecommerce\dinning_page\dinning.php"><img src="images\download.jpg" class='prod_images'></a>
								Kitchen
							</div>

							<div id='prod2'>
								<a href="\Ecommerce\beds\beds.php"><img src="images\download1.jpg" class='prod_images'></a>
								Agriculture
							</div>

						</article>
			<hr>
						<article id='work'>
					
							<h1> Work With Us</h1>
							<!--GREETINNG IMAGE-->
							<div id='work1'>
								<img src="images\job.jpg" id='work_image'>
							</div>

							<div id='work2'>
								We offer a platform for any individuals or company that would like to take their business to the next level 
								and sell their furniture items online. If you are interested <a href="\Ecommerce\retailer_page\signup.php">register</a> with us and start working.Take your
								business to the next level.
								<br><br> If you are already registered <a href="\Ecommerce\retailer_page\login.php">Sign in</a> here.
							</div>
						</article>
			<hr>
						<article id='contact'>
						<!--SET IT TO OCCUPPY 80% TO HAVE A GOOD DESIGN-->
							<div id='contact_set'>
								<h1>Contact</h1><br>
								Impressed and would like to talk to us?<br>
								Send us your feedback<br><br>
								<form>
									<input type="text" name="name" placeholder="Name" size='40'><br><br>
									<input type="text" name="mail" placeholder="Email" size='40'><br><br>
									<textarea name='message' placeholder="Message" rows='10' cols='70'></textarea><br><br>
									<input type="button" name="send_message" value='Send Message'>
								</form>
								<br>
								<hr>
							</div>
						</article >
					</section>
					
			</div>
		</div>
</body>
</html>