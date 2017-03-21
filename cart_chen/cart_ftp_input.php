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
<th>Ftp 下載檔案</th>
</tr>

	
	<form method="post" action="cart_ftp_download.php" >
    <tr>
    	<td>
		檔名:<input type="text" name="ftp_download_filename" />
        <input type="submit">
		</td>
	</tr>
    
    </form>
   

</div><!-- col -->
</div><!-- container End -->
</body>
</html> 
