﻿
</div><!-- container End -->
</body>
</html> 
<?php
	ob_start();
	session_start(); 
	include_once("cart_config.php");
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
	
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"><!--col -->
<!-- -->

		 
		 

<h1>
<tr>
輸入下載結帳單的顧客序號:
</tr>
</h1>
	
	<form method="post" action="cart_ftp_download.php" >
    <h2>
    <tr>
    	<td>
		     <input type="text" name="file" />
        <h2><input type="submit">
		</td>
    </h2>
	</tr>
    
    </form>
   

</div><!-- col -->
</div><!-- container End -->
</body>
</html> 