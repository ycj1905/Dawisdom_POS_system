<!DOCTYPE html>
<html lang="en">
<body data-spy="scroll"  data-offset="60">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>註冊</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<?php
	ob_start();
	if (!isset($_SESSION)) session_start();
	
	
	$_SESSION['login'] = 0;
	//session_start(); 
	require("cart_config_cart.php");
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	require('./cart_navigationBar.php');
	
	echo '<div align="center">';
		echo '<h1>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		
		echo '登出成功';
		echo '<br>';
		echo '請繼續';
		echo '</h1>';
		echo '</div>';
	
?>



</body>
</html>