<?php
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
<title>產品資料庫</title>
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

		 
		 
<table>
<tr>
<th>新增產品</th>
</tr>

	
	<form method="post" action="cart_insert_DB_text.php" >
    <tr>
    	<td>
		編號:<input type="text" name="product_code" />
		</td>
	</tr>
    <tr>
    	<td>
		名稱:<input type="text" name="product_name" />
		</td>
	</tr>
    <tr>
    	<td>
		價格:<input type="text" name="price" />
		</td>
	</tr>
    <tr>
    	<td>
		<!--
               選產品影像檔名<input type="file" name="image" />-->
                選產品影像檔名<input type="text" name="image" />
		</td>
	</tr>
    <tr>
    	<td>
		送出增加產品<input type="submit" value="送出增加產品">
		</td>
	</tr>
    </form>
   

</div><!-- col -->
</div><!-- container End -->
</body>
</html> 
