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
	
	    
		 
		 
<table>

<?php
if(($_SESSION['login'] == 1)) 
		{
			if($_SESSION['username'] == 'admin')
			{
				
echo '<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">';
				echo '<br>';

				echo '<div align="center">';	
						echo '<tr>';
					echo '<th>新增產品</th>';
					echo '</tr>';
					
					echo '<form method="post" action="cart_insert_DB.php" enctype="multipart/form-data">';
					echo '<tr>';
						echo '<td>';
						echo '編號:<input type="text" name="product_code" />';
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>';
						echo '名稱:<input type="text" name="product_name" />';
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>';
						echo '價格:<input type="text" name="price" />';
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>';
							 echo '選產品影像檔名<input type="file" name="image" />';
							
						echo '</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>';
						echo '送出增加產品<input type="submit" value="送出增加產品">';
						echo '</td>';
					echo '</tr>';
					echo '</form>';
			}//if($_SESSION['username'] == 'admin')
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
		$_SESSION['insert_DB']= 'cart_insert_DB_input.php';
		require_once('cart_contact_login_input.php');
	}


?>  
</div><!--<div align="center">-->
</div><!-- col -->
</div><!-- container End -->
</body>
</html> 
