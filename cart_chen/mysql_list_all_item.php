<?php
	ob_start();
	session_start(); 
	include_once("cart_config.php");
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	require('./cart_navigationBar.php');
?>

<body data-spy="scroll"  data-offset="60">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>產品資料庫</title>
<link href="siteCSS/site.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  
<!-- -->
<!--Start: Major Container-->
<!-- -->
<div class="container"><!--container -->
	<span> &nbsp <br></span>
    <span> &nbsp <br></span>
    <span> &nbsp <br></span>
	
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3"><!--col -->
<!-- -->

<?php
$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC"); 
//link databse: user=root, pw=1234, database=mydb

	if (!$results) {
            echo 'Could not run query for $result: ' . mysql_error();
           exit;
         }
		 
		 
//echo "<link rel='stylesheet' type='text/css' href='site.css' />";  		 
		 
echo "<table>";
echo "<tr>";
  echo "<th>品名</th>";
 // echo "<th>價格</th>";
  //echo "<th>Country</th>";
echo "</tr>";

while($obj = $results->fetch_object())
//while($row = mysqli_fetch_row($result))
{
	echo "<tr>";
    echo "<td>";
	echo "{$obj->product_code}";
	echo '<form method="post" action="cart_DB_update.php">';
	echo ' <input type="text" name="product_code" value="新品名編號">';
	echo ' <input type="submit" value="更新">';	
	echo ' </form>';
	echo "</td>";
	echo "</tr>";
    echo "<tr>";
    echo "<td>";
	echo "{$obj->product_name}";
	echo '<form method="post" action="cart_DB_update.php">';
	echo ' <input type="text" name="product_name" value="新品名">';
	echo ' <input type="submit" value="更新">';	
	echo ' </form>';
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
    echo "<td>";
	echo "價格{$obj->price}";
	echo '<form method="post" action="cart_DB_update.php">';
	echo ' <input type="text" name="price" value="新價錢">';
	echo ' <input type="submit" value="更新" >';	
	echo ' </form>';
	echo "</td>";
    echo "</tr>";
	echo "<tr>";
	echo "<td>";
	echo ' <img src="images/';
	echo "{$obj->product_img_name}";
	echo '" width="100" height="100">';
	echo '<form method="post" action="cart_DB_update.php">';
	echo ' <input type="text" name="product_img_name" value="新圖片名稱">';
	echo ' <input type="submit" value="更新">';	
	echo ' </form>'; 
	echo "</td>";
    echo "</tr>\n";
}
  
echo "</table>";
mysqli_close($link);

?>

</div><!-- col -->

</div><!-- container End -->

</body>
</html> 
