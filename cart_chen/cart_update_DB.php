<?php
ob_start();
	session_start(); 
	include_once("cart_config_cart.php");
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);


		//update product_code    
		if(isset($_POST["product_code"]))
		{
			$id=$_POST["id"];
			$product_code=$_POST["product_code"];
			$sql = "UPDATE products SET product_code= '$product_code' WHERE id='$id' ";
			// Prepare statement
			$stmt = $mysqli->prepare($sql);
			// execute the query
			$stmt->execute();
			// echo a message to say the UPDATE succeeded
			echo  " records UPDATED successfully";
		}
		
		//update product_name   
		if(isset($_POST["product_name"]))
		{
			$id=$_POST["id"];
			$product_name=$_POST["product_name"];
			echo $id;echo "<br>";
			echo $product_name;echo "<br>";
			$sql = "UPDATE products SET product_name= '$product_name' WHERE id='$id' ";
			// Prepare statement
			$stmt = $mysqli->prepare($sql);
			// execute the query
			$stmt->execute();
			// echo a message to say the UPDATE succeeded
			echo  " records UPDATED successfully";
		}
		
		//update price    
		if(isset($_POST["price"]))
		{
			$id=$_POST["id"];
			$price=$_POST["price"];
			$sql = "UPDATE products SET price= '$price' WHERE id='$id' ";
			// Prepare statement
			$stmt = $mysqli->prepare($sql);
			// execute the query
			$stmt->execute();
			// echo a message to say the UPDATE succeeded
			echo  " records UPDATED successfully";
		}
		
		//update product_img    
		//if(isset($_FILES['product_img_name']['name']))
	
	if(isset($_POST['product_img_name']))
		{		
		//  ftp *************Start	
		// setup php_ftp for remote uploading image
		$php_ftp = "ftp.dawisdom.com";
		$php_ftp_conn = ftp_connect($php_ftp) or die("Could not connect to $php_ftp");
		$login = ftp_login($php_ftp_conn, "hwafuchen@dawisdom.com", "Glearn@5773988");
		
		$local_file_name = 'local_file/'.$_FILES['image']['name']; 
		$remote_file_name = '/cart_chen/'.$local_file_name; 
		
		// upload file
		if (ftp_put($php_ftp_conn, $remote_file_name, $local_file_name, FTP_IMAGE))
		  {
		  echo "Uploaded successfully local_file_name ***".$local_file_name."***to remote_file_name *** ".$remote_file_name;
		  }
		else
		  {
		  echo "Uploaded failurely local_file_name ***".$local_file_name."***to remote_file_name *** ".$remote_file_name;
		  }
		 
		
		// close connection
		ftp_close($php_ftp_conn);
		//  ftp *************End	
			
		//process for $product_img_name********Start
				$infosfichier = pathinfo($_FILES['image']['name']); 
				$extension_upload = strtolower($infosfichier['extension']);
				$extensions_autorisees = array('jpg', 'jpeg', 'gif','png');
		
				if(in_array($extension_upload,$extensions_autorisees)) 
				{
					$result = move_uploaded_file($_FILES['image']['tmp_name'], 'local_file/'.$_FILES['image']['name']);
		
					if($result)
					{
						 $product_img_name = $_FILES['image']['name']; 
						 }
				}// if(in_array
		//process for $product_img_name********End			
			
		
			$id=$_POST["id"];
//			$product_img_name=$local_file_name;
			
			$sql = "UPDATE products SET product_img_name= '$product_img_name' WHERE id='$id' ";
			// Prepare statement
			$stmt = $mysqli->prepare($sql);
			// execute the query
			$stmt->execute();
			// echo a message to say the UPDATE succeeded
			echo  " records UPDATED successfully";
		}
		
			 // go back to cart_update_DB_input.php
			 require_once('cart_update_DB_input.php');

 
?>