<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html>
<html lang="en">
<head>
  <title>已付帳單明細</title>
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
	ob_start();
	if (!isset($_SESSION)) session_start(); 
	
	if(($_SESSION['login'] == 1)) 
		{
			if(($_SESSION['username'] == 'kitchen')||($_SESSION['username'] == 'admin'))
			{
				//read $print_file_name
				date_default_timezone_set('asia/taipei');
				$day = date("Y-m-d");
				
				$t_file_name = "./server_file/k.txt";
				$file_name = fopen($t_file_name, "r") or die("Unable to open file!");
				// Output one line until end-of-file
				while(!feof($file_name)) 
				{
				   echo fgets($file_name) . "<br>";
				}//wile
				fclose($file_name);
				echo '<h2>';
			//echo '<br>';
			echo '<a href="cart_index.php">重回主畫面</a>';
			echo '</h2>';
				
			}
			else
			{
				echo '<h1>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				
				echo '請用廚房登入';
				require_once('cart_contact_login_input.php');
			}

/*
		
			echo '<h2>';
			echo '<form method="post" action="cart_print_kitchen.php">';
			echo ' <input type="submit"  value="打印" style= "width:120px; height:50px; font-size:35px;">';
			echo ' </form>';
			echo '</h2>';
*/			
			
    }
	else
	{
		$_SESSION['view_kitchen']= 'cart_view_kitchen.php';
		require_once('cart_contact_login_input.php');
	} 				



?>

 		 
    </div>
</html>
