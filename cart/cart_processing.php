<?php
//include 'C:\xampp\htdocs\Ecommerce\retailer_page\dbh.php';
include '../header/dbh.php';
session_start();

if(isset($_SESSION['prevoius_url'])){
	$url = $_SESSION['prevoius_url'];
}else{
	$url = "..\Ecommerce\index.php";
}

if(!isset($_SESSION['id'])){
	header("Location: ".$url."?error=logged");
}else{
	$id = $_POST['new_id'];
	echo $id.'<br>';//furniture id from form
	$logout_time = $_SESSION['logout_time'];
	$customer_id = $_SESSION['customer_id'];
	$quant = 1;
	echo $logout_time.'<br>';
	echo $customer_id.'<br>';
	//select to see if the item exist in the database

	$sql = "SELECT product_id FROM cart WHERE cust_id='$customer_id' and cust_logout='$logout_time' and product_id='$id' ";
	$result = $conn->query($sql);



	if(!$row = $result->fetch_assoc()){
	//data is not found therefore insert for the first time
		echo 'insert for the 1st time';
		$sql = "INSERT INTO cart (cust_id, cust_logout, quantity,product_id) 
					VALUES ('$customer_id','$logout_time','1','$id')";
		$result = $conn->query($sql);

		echo $result;

		header("Location: ".$url);
	}else{
	//data exist therefore select again and increase the quantity
		$sql = "SELECT quantity FROM cart WHERE cust_id='$customer_id' and cust_logout='$logout_time' and product_id='$id' ";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		$old_quantity = $row['quantity'];
		echo $old_quantity."<br>";

		$new_quantity = $old_quantity+1;
		echo $new_quantity;

		echo "data found.'<br>'";
		//do an update on the data found
 
		$sql = " UPDATE cart SET quantity ='$new_quantity' WHERE cust_id='$customer_id' and cust_logout='$logout_time' and product_id='$id' ";
		$result = $conn->query($sql);

		echo 'data updated';

		header("Location: ".$url);
	}
	
	//header("Location: ".$url."?m=sucess");
}



/*
$_SESSION['cart'];

$new_id = $_POSif(isset($_SESSION['prevoius_url'])){
	$url = $_SESSION['prevoius_url'];
}else{
	$url = "..\Ecommerce\index.php";
}T['id'];
echo $new_id;

echo '<br>';
echo sizeof($_SESSION['cart']);

echo '<br>';
array_push($_SESSION['cart'],$new_id);

echo '<br> <br>';

if(isset($_SESSION['prevoius_url'])){
	$url = $_SESSION['prevoius_url'];
}else{
	$url = "..\Ecommerce\index.php";
}


		foreach($_SESSION['cart'] as $key => $value)
		{
			echo $key." has the value". $value."<br>";
		}
		
		$_SESSION['cart'];
		header("Location: ".$url);
		//header("Location: ");		

?>
*/