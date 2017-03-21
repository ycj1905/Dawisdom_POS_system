<?php
	ob_start();
	if (!isset($_SESSION)) session_start(); 
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
	

<br>
<br>
<?php
if(($_SESSION['login'] == 1)) 
		{
			if($_SESSION['username'] == 'admin')
			{
				echo '<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">';
				echo '<br>';

				echo '<div align="center">';
				
				$results = $mysqli->query("SELECT id, product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC"); //ASC <--> ascending
				//link databse: user=root, pw=1234, database=mydb
				
					if (!$results) {
							echo 'Could not run query for $result: ' . mysql_error();
						   exit;
						 }
						 
						 
				//echo "<link rel='stylesheet' type='text/css' href='site.css' />";  		 
						 
				echo "<table>";
				echo "<tr>";
				  echo "<th>修改產品</th>";
				
				echo "</tr>";
				while($obj = $results->fetch_object())
				{
					//form all table items 更新-->cart_update_DB.php********** Start 
					echo "<tr>";
					echo "<td>";
					echo "編號:&nbsp{$obj->product_code}";
					echo '<form method="post" action="cart_update_DB.php">';
					echo ' <input type="text" name="product_code" value="';
					echo "{$obj->product_code}";
					echo '"/>';
					echo ' <input type="submit" value="更新">';                // post "product_code"
					echo ' <input type="hidden" name="id" value="';           // post "id"
					echo "{$obj->id}";
					echo '" />';	
					echo ' </form>';
					echo "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>";
					echo "名稱:&nbsp{$obj->product_name}";
					echo '<form method="post" action="cart_update_DB.php">';
					echo ' <input type="text" name="product_name" value="';
					echo "{$obj->product_name}";
					echo '"/>';
					echo ' <input type="submit" value="更新">';                // post "product_name"
					echo ' <input type="hidden" name="id" value="';            // post "id"
					echo "{$obj->id}";
					echo '" />';	
					echo ' </form>';
					echo "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>";
					echo "價格:&nbsp{$obj->price}";
					echo '<form method="post" action="cart_update_DB.php">';
					echo ' <input type="text" name="price" value="';
					echo "{$obj->price}";
					echo '"/>';
					echo ' <input type="submit" value="更新" >';               // post "price"
					echo ' <input type="hidden" name="id" value="';           // post "id"
					echo "{$obj->id}";
					echo '" />';	
					echo ' </form>';
					echo "</td>";
					echo "</tr>";
					echo "<tr>";
					echo "<td>";
					echo ' <img src="local_file/';
					echo "{$obj->product_img_name}";
					echo '" width="100" height="100">';
					echo "{$obj->product_img_name}";
					
					echo '<form method="post" action="cart_update_DB.php" enctype ="multipart/form-data">';
					echo '選產品影像檔名<input type="file" name="image" />';
					echo ' <input type="hidden" name="product_img_name" />';
					echo ' <input type="submit" value="更新">';            // post "product_img_name"
					echo ' <input type="hidden" name="id" value="';          // post "id"
					echo "{$obj->id}";
					echo '" />';	
					echo ' </form>';
					
					
					//form all table items 更新-->cart_update_DB.php********** End 
					echo "</td>";
					echo "</tr>\n";
				}
				  
				echo "</table>";
				mysqli_close($link);
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
		$_SESSION['update_DB']= 'cart_update_DB_input.php';
		require_once('cart_contact_login_input.php');
	}





?>

</div><!--<div align="center">-->
</div><!-- col -->
</div><!-- container End -->
</body>
</html> 
