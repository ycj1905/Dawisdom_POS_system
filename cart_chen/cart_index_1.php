<?php
	ob_start();
	session_start(); 
	require("cart_config.php");
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
<?php

		if(empty($_SESSION["cart_view_cart"]))
	   {
			$_SESSION["cart_index"]=1;   // cart_view_cart.php reset self
			$_SESSION["cart_view_cart"]=1;  // cart_view_cart.php go to cart_index.php
			$file_name = fopen("./server_file/customer_no.txt", "r");
			//$customer_no = ( int ) fgets($file_name) ;
			$customer_no = ( int ) fread($file_name, 20) ;
			fclose ($file_name) ;
	
			$customer_no=$customer_no+1;
	         //echo 'customer_no+1: '. $customer_no;
			 
			//customer_no.txt store master $customer_no
			$file_name = fopen("./server_file/customer_no.txt", "w");  
			$data = "$customer_no" ;
			fwrite($file_name, $data);
			fclose ($file_name) ;

			//customer_no_no.txt store initial $customer_no
			
			$initial_customer_no=$customer_no . "_no";
			$_SESSION["initial_customer_no"]=$initial_customer_no;
			$file_name = fopen("./server_file/" . $initial_customer_no.".txt", "w");  			
			$data = "$customer_no" ;
			fwrite($file_name, $data);
			fclose ($file_name) ;
	
	    }//if(empty($_SESSION["cart_view_cart"]))
		else//if(!empty($_SESSION["cart_view_cart"]))
		{
			//retrieve initial $customer_no
				
			$initial_customer_no=$_SESSION["initial_customer_no"];
			$file_name = fopen("./server_file/" . $initial_customer_no.".txt", "r");  			//$customer_no = fgets($file_name) ;
			$customer_no = ( int ) fread($file_name, 20) ;
			fclose ($file_name) ;
		}//if(!empty($_SESSION["cart_view_cart"]))


// set timezone='asia/taipei'and Prints something like: Monday 8th of August 2005 03:12:46 PM 
date_default_timezone_set('asia/taipei');
$date=date('l jS \of F Y h:i:s A');
echo $date;echo "<br>";
$day = date("Y-m-d");  //current day
echo 'day:'.$day;
echo "<br>";

//to set 序號 and 桌號 and day
 $file_name = fopen("./server_file/customer_no.txt", "r"); 
  if(!$file_name)
  { 
  		echo "could not open the file" ; }
   else
   {
		//$customer_no = ( int ) fgets($file_name) ;
		$customer_no = ( int ) fread($file_name, 20) ;
		fclose ($file_name) ;
		
		$file_name = fopen("./server_file/day.txt", "r");
		//$Stored_day = fgets($file_name) ;
		$Stored_day =  fread($file_name, 20) ;
		echo 'Stored_day:'.$Stored_day;
		echo "<br>";
		
		if ($day==$Stored_day)
		{
			echo"序號： ".$customer_no ;
			$_SESSION["customer_no"]=$customer_no ;
		}
		else//if ($day!=$Stored_day)
		{
							
			//header("Refresh:0; url= unset_order_no_session_variables.php ");
			require('./cart_unset_order_no.php');	
			
			$customer_no=1;
			echo"序號： ".$customer_no ;
			$_SESSION["customer_no"]=$customer_no ;	
			//customer_no.txt store master $customer_no
			$file_name = fopen("./server_file/customer_no.txt", "w");  
			
			$data = "$customer_no" ;
			fwrite($file_name, $data);
			fclose ($file_name) ;
			
			//customer_no_no.txt store initial $customer_no
			
			$initial_customer_no=$customer_no . "_no";
			$_SESSION["initial_customer_no"]=$initial_customer_no;
			$file_name = fopen("./server_file/" . $initial_customer_no.".txt", "w");  			
			$data = "$customer_no" ;
			fwrite($file_name, $data);
			fclose ($file_name) ;
					
		}//else--if ($day==$Stored_day)
	}//else -- if(!$file_name)
	
//set $customer_no  oooooooooooooooooooooooooooooo End
	
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
echo ' <input type="submit">';
echo ' </form>';

//set $table_no  oooooooooooooooooooo End
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
