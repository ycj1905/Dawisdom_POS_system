﻿<?php
ob_start();
	session_start(); 
	include_once("cart_config_cart.php");
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

  
if(isset($_POST["product_code"]))
{
	$product_code=$_POST["product_code"];
	$product_name=$_POST["product_name"];
	$price=$_POST["price"];
	$product_img_name=$_POST["image"];
	
//  ftp *************Start	
// setup php_ftp for remote uploading image
$php_ftp = "ftp.dawisdom.com";
$php_ftp_conn = ftp_connect($php_ftp) or die("Could not connect to $php_ftp");
$login = ftp_login($php_ftp_conn, "hwafuchen@dawisdom.com", "Bluehost@5773988");

$local_file_name = 'images/'.$product_img_name; 
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
	
/*	
//process for $product_img_name********Start
		$infosfichier = pathinfo($image_name); 
        $extension_upload = strtolower($infosfichier['extension']);
        $extensions_autorisees = array('jpg', 'jpeg', 'gif','png');

        if(in_array($extension_upload,$extensions_autorisees)) 
        {
            $result = move_uploaded_file($_FILES['image']['tmp_name'], 'images'.$_FILES['image']['name']);

            if($result)
			{
				 $product_img_name = $_FILES['image']['name']; 
				 }
        }// if(in_array
//process for $product_img_name********End	
*/


//insert record
    // begin the transaction  
	$pdo->beginTransaction();
    // our SQL statememtns
    $pdo->exec("INSERT INTO products (product_code, product_name, price, product_img_name) VALUES ('$product_code', '$product_name', '$price', '$product_img_name')");
    // commit the transaction
    $pdo->commit();
    echo "New record created successfully";	

	 // go back to cart_update_DB_input.php
     header("Refresh:0; url= cart_insert_DB_input_text.php ");

}//if(isset($_POST["product_code"]))
else
{
 echo '$_POST["product_code"] is not set. This program is terminated.';		
	}



/*
If you want the user to be prompted to save the data you are sending, such as a generated PDF file, you can use the » Content-Disposition header to supply a recommended filename and force the browser to display the save dialog.	 
// We'll be outputting a PDF
header('Content-Type: application/pdf');

// It will be called downloaded.pdf
header('Content-Disposition: attachment; filename="downloaded.pdf"');

// The PDF source is in original.pdf
readfile('original.pdf');

	 
*/	 
?>