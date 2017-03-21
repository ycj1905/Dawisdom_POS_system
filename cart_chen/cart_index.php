<?php
	ob_start();
	if (!isset($_SESSION)) session_start();
	
	if (!isset($_SESSION['login']))
	{
		$_SESSION['login']=0;
	}
	//$_SESSION['login'] = 0;
	//session_start(); 
	require_once("cart_config_cart.php");
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	require_once('./cart_navigationBar.php');
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
<?php
	
	 if (ISSET( $_POST["customer_no"]))
	 {
		 $customer_no =($_POST["customer_no"]);
		 $_SESSION["customer_no"]=$customer_no;
	 }//if (ISSET( $_POST["customer_no"]))
	 else// not if (ISSET( $_POST["customer_no"]))
	 {
	  	$customer_no=$_SESSION["customer_no"];
	  	$_SESSION["customer_no"]=$customer_no;
	 }// not if (ISSET( $_POST["customer_no"]))

date_default_timezone_set('Asia/Taipei');
$date=date("Y-m-d H:i:s");
echo $date;echo "<br>";	 
//echo '_SESSION[login]:  '.$_SESSION['login'];	
echo '顧客入站序號:  '.$customer_no;			
/*	
//set $table_no  ******************** Start	

 if (empty($_POST["table"])) {
    $table_no=0;
  } else {
    $table_no =($_POST["table"]);
	$_SESSION["table"]=$table_no;
  }
 if (ISSET($_SESSION["table"])) {
	$table_no=$_SESSION["table"];
 }
 
echo '<form method="post" action="">';
echo '桌號: <input type="text" name="table" size="10" value='.$table_no;echo ' >';
echo ' <input type="hidden" name="customer_no" size="10" value='.$customer_no;
echo ' >';
echo ' <input type="submit">';
echo ' </form>';

//set $table_no  oooooooooooooooooooo End

*/
?>
</h2>

<h2 align="center">
點餐菜單
</h2> 


<!-- all items 加入購物車********** Start -->

<?php
// require('./cart_view_cart.php');

$results = $mysqli->query("SELECT product_code, product_name, product_desc, product_img_name, price FROM products ORDER BY id ASC");
if($results){ 
echo '<ul class="products">';
//fetch results set as object and output HTML

while($obj = $results->fetch_object())
{
//form ********************for 加入購物車-->cart_update.php***  Start
echo '
	<li class="product">

	<form method="post" action="cart_update.php">
	<div class="product-content"><h4>';
	 
	echo "{$obj->product_name}";
	echo '</h4>';
	
echo '	
	<div class="product-info">
	金額';
echo "$currency";
echo "{$obj->price}";
	 
echo '數量
		<select name="product_qty" >';// 1) send product_qty
		//echo '<option value="'.$product_qty.'">'.$product_qty.'</option>'; 
	$item=20;
	for ($i = 0; $i <= $item; $i++) : 
        echo '<h1><option value="';echo $i;echo '">'; echo $i; echo "</option></h1>";
    endfor; 
echo "</select>";
echo ' <input type="submit" value="加入購物車">';	

	echo ' <input type="hidden" name="product_code" value="';//2) send product_code
	echo "{$obj->product_code}";
	echo '" />';	
	echo ' <input type="hidden" name="type" value="add" />';//3) send type	
	echo ' <input type="hidden" name="return_url" value="';//4) send return_url
	echo "{$current_url}";
	echo '" />';	
	echo ' <img src="local_file/';
	echo "{$obj->product_img_name}";
	echo '" width="150" height="150">';	
	
	echo ' </div></div>';	
	echo ' </form>';
//form ****************for 加入購物車-->cart_update.php***  End	
	echo ' </li>';	

}//while
echo '</ul>';

}//if($results){

//Get $print_file_name *****************
$print_file_name='./server_file/'.$customer_no.'.txt';

//write $print_file_name *****************   Start
if (file_exists($print_file_name))
{
	$file_name = fopen("$print_file_name", "a");
}
else
{
	$file_name = fopen("$print_file_name", "x");
}

$txt = "";fwrite($file_name, $txt);//only create file, but write nothing
fclose($file_name);
//write $print_file_name ooooooooooooooooooo End

?>
</div> <!-- container -->
     
<!-- all items 加入購物車********** End -->

</body>
</html>
