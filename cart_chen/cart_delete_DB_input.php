

<!DOCTYPE html>
<html lang="en">
<body data-spy="scroll"  data-offset="60">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>資料庫刪除項目選單</title>
<link href="siteCSS/site.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<?php
	ob_start();
	session_start(); 
	include_once("cart_config_cart.php");
	
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	require_once('./cart_navigationBar.php');
	
?>
  
<!-- -->
<!--Start: Major Container-->
<!-- -->
<div class="container"><!--container -->
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
				
				
				
				echo '<h1>刪除產品</h1>';
				 echo '<table width="100%"  cellpadding="6" cellspacing="0">';
				echo '<thead>';
				echo '<tr><th>品名</th><th>價格</th><th>&nbsp</th></tr>';
				echo '</thead>';
				echo '<tbody>';
				
				
				
					$results = $mysqli->query("SELECT id, product_name, product_img_name, price FROM products ORDER BY id ASC"); //ASC <--> ascending
				//link databse: user=root, pw=1234, database=mydb
				
					if (!$results) {
							echo 'Could not run query for $result: ' . mysql_error();
						   exit;
						 }
					
					$b = 0; //var for zebra stripe table 
						
					while($obj = $results->fetch_object())
					{
							echo '<form method="post" action="cart_delete_DB.php">';//***** 刪除 ==>cart_delete_DB.php********** Start-->		
							$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
							echo '<tr class="'.$bg_color.'">';
							echo '<td>';
							echo "{$obj->product_name}";
							echo '</td>';
							echo '<td>';
							echo "$currency";
							echo "{$obj->price}";
							echo '</td>';
							echo '<td><input type="submit" value="刪除" /></td>';
							echo '</tr>';
							echo ' <input type="hidden" name="id" value="';          // post "id"
							echo "{$obj->id}";
							echo '" />';
							echo ' </form>';//***** 刪除 ==>cart_delete_DB.php********** end-->
					}//while
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
		$_SESSION['delete_DB']= 'cart_delete_DB_input.php';
		require_once('cart_contact_login_input_intermediate.php');
	} 				




?>
    </tbody>
</table>

</div>  <!--<div align="center"> --> 
</div><!-- col -->
</div><!-- container End -->
</body>
</html> 