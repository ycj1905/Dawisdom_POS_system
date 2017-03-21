<?php
	ob_start();
	session_start(); 
	include_once("cart_config.php");
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	require('./cart_navigationBar.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>點餐菜單</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class=container><!-- container Start -->
<h1>
<br><!-- insert a line -->
<br><!-- insert a line -->
</h1>


<h2 align="center">
本系統網址：
<br>
www.dawisdom.com
<br>
<br>
QR code
<br>
<br>
<img src="images/qrcode_www_dawisdom_com.jpg">
<br>
<br>
本系統網址：
<br>
www.dawisdom.com
</h2>


</body>
</html>