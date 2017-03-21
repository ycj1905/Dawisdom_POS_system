<!DOCTYPE html>
<html lang="en">
<head>
  <title>dawisdom</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./bootstrap_css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="./bootstrap_js/jquery.min.js"></script>
  <script src="./bootstrap_js/bootstrap.min.js"></script>
<style>
 .char-brown {
      color: #900;
	  
  }
  .char-padding {
     
	  padding: 50px 0px 0 0;
  }
  .bg-grey2 {
      background-color: #3399CC;
  }
  .bg-grey3 {
      background-color: #F0F0F0;
  }
 
  .char-blue {
      color: #009;
  }
  
  .panel {
      border: 5px solid #66CCFF; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
	  
  }
  .col-sm-4 {
        font-size: 25px !important;
	   margin: 3px 3;
    }
  .pay {
	 	 color: #222;
        font-size: 20px !important;
	   
    }
  
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #960000;
      z-index: 9999;
      border: 0;
      font-size: 16px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
  }
     .navbar-lang {
      margin-bottom: 0;
      background-color: #300;
	  color: #600;
      z-index: 9999;
      border: 0;
      font-size: 10px !important;
      
      letter-spacing: 0px;
      border-radius: 0;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  
  
  </style>
</head>


<div class="container pay bg-grey3">
	
    


<?php
$customer_no = $_POST['cart_ftp_pay'];

//Get $print_file_name *****************
$print_file_name='./server_file/'.$customer_no.'.txt';

if(file_exists($print_file_name))
{

		//read $print_file_name
		$file_name = fopen("$print_file_name", "r") or die("Unable to open file!");
		// Output one line until end-of-file
		while(!feof($file_name)) 
		{
		   echo fgets($file_name) . "<br>";
		}//wile
		fclose($file_name);
		
			echo '<h2>';
			echo '<form method="post" action="cart_ftp_pay.php">';
			echo ' <input type="hidden" name="cart_ftp_pay" size="10" value='.$customer_no;
			echo ' >';
			echo ' <input type="submit"  value="確認" style= "width:120px; height:50px; font-size:35px;">';
			echo ' </form>';
			echo '<br>';
			echo '<a href="cart_ftp_pay_input.php">重新輸入</a>';
			echo '</h2>';
}
else
{
			echo '<br>';
			echo '<h2>';
			echo '<a href="cart_ftp_pay_input.php">序號輸入有誤，請重新輸入</a>';
			echo '</h2>';
}
?>

 		 
    </div>
</html>
