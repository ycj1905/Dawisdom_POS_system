﻿<?php
	ob_start();
	session_start(); 
	include_once("cart_config_cart.php");
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	require('./cart_navigationBar.php');
?>
<!DOCTYPE html>
<html lang="en">

<body data-spy="scroll"  data-offset="60">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>交錢付款</title>
<link href="siteCSS/site.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>  
<!-- -->
<!--Start: Major Container-->
<!-- -->
<div class="container"><!--container -->
	<span> &nbsp <br></span>
    <span> &nbsp <br></span>
    <span> &nbsp <br></span>
    <span> &nbsp <br></span>
    <span> &nbsp <br></span>
	


<?php
if(($_SESSION['login'] == 1)) 
		{
			if($_SESSION['username'] == 'admin')
			{
				echo '<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">';
				echo '<br>';

				echo '<div align="center">'; 
		 
				echo '<table>';
				echo '<tr>';
				echo '<th>請輸入要檢視的月份（例：三月 輸入 3）:</th>';
				echo '</tr>';
				
					
					echo '<form method="post" action="./cart_view_pay_month.php" >';
					echo '<tr>';
						echo '<td>';
						echo '輸入月份（例：三月 輸入 3）:<input type="text" name = "pay_month"  style="height:30px; width:50px"/>';
						echo '<input type="submit"  style="height:30px; width:50px">';
						echo '</td>';
					echo '</tr>';
					
					echo '</form>';
			}
			else
			{
				echo '<h1>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				
				echo '請用店主登入';
				require_once('cart_contact_login_input.php');
			}
		}
	else
	{
		$_SESSION['view_pay_month']= 'cart_pay_single_month.php';
		require_once('cart_contact_login_input.php');
	} 				



?> 
   
</div><!--<div align="center">-->
</div><!-- col -->
</div><!-- container End -->
</body>
</html> 
