<?php
ob_start();
	session_start(); 
	include_once("cart_config_cart.php");
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);


//update product_code    
		if(isset($_POST["id"]))
		{
			$id=$_POST["id"];
			echo "$id  <br>";
			$sql = "DELETE FROM products WHERE id='$id' ";
			// Prepare statement
			$stmt = $mysqli->prepare($sql);
			// execute the query
			$stmt->execute();
			// echo a message to say the UPDATE succeeded
			echo  " records UPDATED successfully";
		}
		
		
			 // go back to cart_update_DB_input.php
			 require_once('cart_delete_DB_input.php');

?>