<?php  //php 1
if (!isset($_SESSION)) session_start();
require_once("cart_config_cart.php");
require_once('./cart_navigationBar.php');
?><!-- php 1 -->

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css"></head>
<body>

<div class=container><!-- container Start -->
<h1>
<br><!-- insert a line -->
<br><!-- insert a line -->
<br><!-- insert a line -->
<br><!-- insert a line -->
</h1>

<h2 align="center">
<?php  //php 2
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

echo '顧客入站序號:  '.$customer_no;
echo '<br>';

//set $table_no  *************************** Start
 if (empty($_POST["table"])) 
 {
    $table_no=0;
		
  } 
  else 
  {
	  $table_no =($_POST["table"]);
	  $_SESSION["table"]=$table_no;
   }//else
  if (empty($_POST["people"])) 
 {
    $people_no=0;
	
  } 
  else 
  {
	  $people_no =($_POST["people"]);
	  $_SESSION["people"]=$people_no;
  }//else
  
  if (ISSET($_SESSION["table"])) 
 {
	$table_no=$_SESSION["table"];
		
 }//if (ISSET($_SESSION["table"]))

 if (ISSET($_SESSION["people"])) 
 {
	
	$people_no=$_SESSION["people"];
	
 }//if (ISSET($_SESSION["table"]))

// print table_no
echo '桌號: '.$table_no;
echo '-----';
echo '人數: '.$people_no;
 
$bg_color=0;
$total_discount=0;
$grand_total=0; 
$tax_item["service_charge"]=0;
$tax_item["sales_tax"]=0;

?><!-- php 2 -->
</h2>
<h2 align="center">
結帳明細
</h2>

<div class="cart-view-table-back"><!--<div class="cart-view-table-back">-->
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0">
    <thead>
    	<tr><th>更新數量</th><th>餐點</th><th>價格</th><th>總和</th></tr>
    </thead>
  <tbody>
 
 <?php //php 3

if(isset($_SESSION['discount']))
{
    $discount=$_SESSION['discount'];	
}

if(isset($_SESSION['service']))
{
    $taxes['service_charge']=$_SESSION['service'];	
}
if(isset($_SESSION['sales']))
{
    $taxes['sales_tax']=$_SESSION['sales'];	
} 
 
 
if(isset($_SESSION["cart_products"])) //check $_SESSION["cart_products"]
{//check $_SESSION["cart_products"]
		$total_item_no=0;
		$total = 0; //set initial total value
		$b = 0; //var for zebra stripe table 

	foreach ($_SESSION["cart_products"] as $key => $cart_itm)
    {//foreach ($_SESSION["cart_products"]
			
			$total_item_no=$total_item_no+1;
			//set variables to use in content below
			$product_name = $cart_itm["product_name"];
			$product_qty = $cart_itm["product_qty"];
			$product_price = $cart_itm["product_price"];
			$product_code = $cart_itm["product_code"];
			//$product_color = $cart_itm["product_color"];
			$subtotal = ($product_price * $product_qty); //Price x Qty
			//echo '$key=  '.$key."<br>";
			//echo '$product_price=  '.$product_price."<br>";
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 

		if($product_qty!=0)
		{  //if($product_qty==0)
		echo '<tr class="'.$bg_color.'">';
		echo '<td>';
		echo '
				<select name="product_qty['.$product_code.']" >';
				echo '<option value="'.$product_qty.'">'.$product_qty.'</option>'; 
			$item=20;
			for ($i = 0; $i <= $item; $i++) : 
				echo '<h1><option value="';echo $i;echo '">'; echo $i; echo "</option></h1>";
			endfor; 
			
		echo "</select>";
		echo "<h7>";
		//echo ' <input type="submit" size="2" value="更新數量">';
        echo '<input type="submit" value="提交"  style="height:30px; width50px" />';
		echo "</h7>";
		echo '</td>';			
					
					echo '<td>'.$product_name.'</td>';
					//echo '<td>'.$currency.$product_price.'</td>';
					//echo '<td>'.$product_price.'</td>';
					echo '<td>'.sprintf("%.0f", $product_price).'</td>';
					echo '<td>'.$subtotal.'</td>';
					echo '</tr>';
		}//if($product_qty==0)
			
			$total = ($total + $subtotal); //add subtotal to total var
	}//foreach (($_SESSION["cart_products"]
		
		$total_discount =round( $total * (1-$discount)); //grand total including shipping cost
		$grand_total=$total_discount;
		foreach($taxes as $key => $value)
		{ //list and calculate all taxes in array
				$tax_amount     = round($grand_total * $value);//10%for the first item
				$tax_item[$key] = $tax_amount;
				$grand_total   = $grand_total + $tax_amount;  //add tax val to grand total
		}//list and calculate all taxes in array
		
		$list_tax       = '';
		foreach($tax_item as $key => $value)
		{ //List all taxes
			$list_tax .= $key. ' : '. sprintf("%01.2f", $value).'<br />';
		} //List all taxes
		
		$grand_total = $grand_total + $shipping_cost; //grand total including shipping cost
		$shipping_cost = ($shipping_cost)?'運費: '. sprintf("%10.2f", $shipping_cost).'<br />':'';
		$discount_print = ($discount)?'優待折扣價（95折） : '. sprintf("%10.2f", $total_discount).'<br />':'';
		
}//check $_SESSION["cart_products"]

    ?>	<!-- php 3 -->
    
    
    
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form><!--action="cart_update.php"> -->

<?php  //php 4

//one row containing one discount dropdown list**********************Start
echo '<form method="post" action="cart_update_discount_tax.php">';
echo '<tr class="'.$bg_color.'">';
echo '<td>';
echo '<select name="discount" >'; //discount*************
		echo '<option value="'.$discount.'">'.$discount.'</option>'; 
	$item=0.5;
	for ($i = 0; $i <= $item; $i=$i+0.05) : 
        echo '<h1><option value="';echo $i;echo '">'; echo $i; echo "</option></h1>";
    endfor; 
echo "</select>";
//echo ' <input type="submit" value="更新或刪除">';
echo '<input type="submit" value="提交"  style="height:30px; width:50px" />';
 
echo '</td>';			
    		echo '<td>折扣優待後價錢 &nbsp'.'&nbsp'.$total_discount .'</td>';
		    echo '</tr>';
 
echo ' </form>';
//one row containing one dropdown list   oooooooooo   End 

//one row containing one service_charge dropdown list**********************Start
echo '<form method="post" action="cart_update_discount_tax.php">';
echo '<tr class="'.$bg_color.'">';
echo '<td>';
echo '<select name="service" >';// service****************
        $serviceCharge=$taxes["service_charge"];
		echo '<option value="'.$serviceCharge.'">'.$taxes["service_charge"].'</option>';
		
	$item=0.1;
	for ($i = 0; $i <= $item; $i=$i+0.1) : 
        //echo '<h1><option value="';echo $i;echo '">'; echo $i; echo "</option></h1>";
		echo '<h1><option value="';echo $i;echo '">'; echo sprintf("%.2f",$i); echo "</option></h1>";
    
	endfor; 
echo "</select>";
//echo ' <input type="submit" value="更新或刪除">';
echo '<input type="submit" value="提交"  style="height:30px; width:50px" />';

echo '</td>';			
echo '<td>服務費 &nbsp'.'&nbsp'.$tax_item["service_charge"].'</td>';
echo '</tr>';
echo ' </form>';
//one row containing one dropdown list   ooooooooooo  End 

//one row containing one dsales_tax dropdown list**********************Start
echo '<form method="post" action="cart_update_discount_tax.php">';
echo '<tr class="'.$bg_color.'">';
echo '<td>';
echo '<select name="sales" >';//Sales************************
        $salesTax=$taxes["sales_tax"];
echo '<option value="'.$salesTax.'">'.$taxes["sales_tax"].'</option>'; 
			
	$item=0.05;
	for ($i = 0; $i <= $item; $i=$i+0.05) : 
echo '<h1><option value="';echo $i;echo '">'; echo $i; echo "</option></h1>";
    endfor; 
echo "</select>";
//echo ' <input type="submit" value="更新或刪除">';
echo '<input type="submit" value="提交"  style="height:30px; width:50px" />';
echo '</td>';			
echo '<td>發票稅 &nbsp'.'&nbsp'.$tax_item["sales_tax"].'</td>';
echo '</tr>';

echo ' </form>';
echo '</tr>';
 if (empty($_POST["pay_amount"])) 
 {
    $pay=0;
  } else {
    $pay =($_POST["pay_amount"]);
  }//(empty($_POST["pay_amount"]))			

echo ' </form>';

echo '<form method="post" action="">';
echo '<tr class="'.$bg_color.'">';
echo '<td>總價 &nbsp'.'&nbsp'.$grand_total.'</td>';
echo '</tr >';

echo '<tr >';//**********
echo '<td>';
echo '付款金額: <input type="text" name="pay_amount" style="height:30px; width:80px" value='.$pay;
echo ' >';
echo '</td>';
echo '</tr >';

echo '<tr >';
echo '<td>';
echo '桌號: <input type="text" name="table" style="height:30px; width:80px"  value='.$table_no;
echo ' >';
echo '</td>';
echo '<td>';
echo '人數: <input type="text" name="people" style="height:30px; width:80px"  value='.$people_no;
echo ' >';
echo '</td>';
echo '</tr >';

echo '<tr >';
echo '<td >';
            echo ' <input type="submit">';
echo '</td >';
echo '</tr >';//oooooooo

echo ' </form>';

if (isset($_POST["pay_amount"]))
{	
	$change=$_POST["pay_amount"]-$grand_total;
	$pay=$_POST["pay_amount"];
echo '<tr >';
echo '<td >';	
				echo ' 找零金額: '.$change;
echo '</td >';
echo '</tr >';		
}
//calcualate changes   oooooooooo  End          
?> <!-- php 4 -->

  </tbody>
</table>

</div><!--<div class="cart-view-table-back">-->

</div> <!-- container Start -->
     
<!-- all items 加入購物車********** End -->

<div class="cart-view-table-back">
<table width="100%"  cellpadding="6" cellspacing="0">
<!--
 <thead>
    	<tr><th>餐點名稱</th><th>數量</th><th>價格</th><th>總和</th></tr>
    </thead>   
  <tbody>
-->

<?php //php 5

if (empty ($p_product)) {$p_product="";}

if(isset($_SESSION["cart_products"])) //check $_SESSION["cart_products"]
{//check $_SESSION["cart_products"]

		$total = 0; //set initial total value
		$b = 0; //var for zebra stripe table 

		foreach ($_SESSION["cart_products"] as $key => $cart_itm)
        {//foreach ($_SESSION["cart_products"]
			
			//set variables to use in content below
			$product_name = $cart_itm["product_name"];
			$product_qty = $cart_itm["product_qty"];
			$product_price = $cart_itm["product_price"];
			$product_code = $cart_itm["product_code"];
			//$product_color = $cart_itm["product_color"];
			$subtotal = ($product_price * $product_qty); //Price x Qty
			//echo '$key=  '.$key."<br>";
			//echo '$product_price=  '.$product_price."<br>";
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 

		if($product_qty!=0)
		{  //if($product_qty==0)
		
		$p_product.="品名:  ".$product_name;
		$p_product.="     數量:  ".$product_qty;
		$p_product.="  單價:  ".$product_price;
		$p_product.="    單項總價:  ".$subtotal;
		$p_product.=" \r\n";
				
		}//if($product_qty==0)
			
			//$total = ($total + $subtotal); //add subtotal to total var
        }//foreach (($_SESSION["cart_products"]
		
		
		
}//check $_SESSION["cart_products"]

echo '</tbody>';


 if (empty($tax_item["service_charge"])) 
 {
 }
 else
 {
	$item=round($tax_item["service_charge"]/$grand_total,1);
 }


 if (empty($tax_item["sales_tax"])) 
 {
	 $tax_item["sales_tax"]=0;
	 $sales_tax_rate=0;
 }
 else
 {
	$sales_tax_rate=round($tax_item["sales_tax"]/$grand_total,2);
 }
 

//new text

if (isset($_POST["pay_amount"]))
{	
	$change=$_POST["pay_amount"]-$grand_total;
	$pay=$_POST["pay_amount"];
	

}
else
{
	$change=0;
	$pay=0;
}

if (empty($tax_item["service_charge"])) 
 {
	 $item=0;
	 $tax_item["service_charge"]=0;
 }
 else
 {
	$item=round($tax_item["service_charge"]/$grand_total,1);
 }
  
 

//Get $print_file_name *****************
$print_file_name='./server_file/'.$customer_no.'.txt';

//write $print_file_name *****************
if (file_exists($print_file_name))
{
	$fp = fopen("$print_file_name", "w");
}
else
{
	$fp = fopen("$print_file_name", "x");
}

//$txt = "my_DB.txt: \n\n";
//$txt = "\r\n";fwrite($fp, $txt);

fwrite($fp, $total_item_no);
$txt = " - 購買項數 ";fwrite($fp, $txt);
$txt = "\r\n";fwrite($fp, $txt);


$txt = "顧客入站序號: ";fwrite($fp, $txt);
fwrite($fp, $customer_no);
$txt = "\r\n";fwrite($fp, $txt);



$txt = "桌號: ";fwrite($fp, $txt);
fwrite($fp, $table_no);
$txt = "----";fwrite($fp, $txt);
$txt = "人數: ";fwrite($fp, $txt);
fwrite($fp, $people_no);
$txt = "\r\n";fwrite($fp, $txt);
//$txt = "\r\n";fwrite($fp, $txt);

fwrite($fp, $date);
$txt = "\r\n";fwrite($fp, $txt);

$txt = "結帳明細收據：";fwrite($fp, $txt);
$txt = "\r\n";fwrite($fp, $txt);

fwrite($fp, $p_product);
//$txt = "\r\n";fwrite($fp, $txt);

$txt = "折扣: ";fwrite($fp, $txt);
fwrite($fp, $discount);
$txt = "  折扣優待後價錢: ";fwrite($fp, $txt);
fwrite($fp, $total_discount);
$txt = "\r\n";fwrite($fp, $txt);

$txt = "服務費率: ";fwrite($fp, $txt);
fwrite($fp, $item);
$txt = "  服務費: ";fwrite($fp, $txt);
fwrite($fp, $tax_item["service_charge"]);
$txt = "\r\n";fwrite($fp, $txt);

$txt = "發票稅率: ";fwrite($fp, $txt);
fwrite($fp, $sales_tax_rate);
$txt = "  發票稅: ";fwrite($fp, $txt);
fwrite($fp, $tax_item["sales_tax"]);
$txt = "\r\n";fwrite($fp, $txt);

$txt = "總價金額: ";fwrite($fp, $txt);
fwrite($fp, $grand_total);
$txt = "\r\n";fwrite($fp, $txt);

$txt = "  付款金額: ";fwrite($fp, $txt);
fwrite($fp, $pay);
$txt = "\r\n";fwrite($fp, $txt);

$txt = "  找零金額: ";fwrite($fp, $txt);
fwrite($fp, $change);
$txt = "\r\n";fwrite($fp, $txt);

//$txt = "\r\n";fwrite($fp, $txt);

fclose($fp);



//read $print_file_name
$fp = fopen("$print_file_name", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($fp)) 
{
   echo fgets($fp) . "<br>";
}//wile
fclose($fp);

?><!-- php 5 -->

</body>
</html>
