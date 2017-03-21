<?php
session_start();
include_once("cart_config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css"></head>
<body>

<h2 align="center">
<?php
 require('./cart_counter.php'); 
?>

</h2>
<h2 align="center">
結帳明細
</h2>

<div class="cart-view-table-back">
<form method="post" action="cart_update.php">
<table width="100%"  cellpadding="6" cellspacing="0">
    <thead>
    	<tr><th>數量</th><th>餐點</th><th>價格</th><th>總和</th></tr>
    </thead>
  <tbody>
 	<?php
		if(isset($_SESSION["cart_products"])) //check session var
    {
		$total = 0; //set initial total value
		$b = 0; //var for zebra stripe table 
		foreach ($_SESSION["cart_products"] as $key => $cart_itm)
        {//foreach ($_SESSION[
		
			
			
			//set variables to use in content below
			$product_name = $cart_itm["product_name"];
			$product_qty = $cart_itm["product_qty"];
			$product_price = $cart_itm["product_price"];
			$product_code = $cart_itm["product_code"];
			//$product_color = $cart_itm["product_color"];
			$subtotal = ($product_price * $product_qty); //calculate Price x Qty
			//echo '$key=  '.$key."<br>";
			//echo '$product_price=  '.$product_price."<br>";
		   	$bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 

if($product_qty!=0){  //if($product_qty==0)
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
echo ' <input type="submit" value="更新">';
echo '</td>';			
		
			//echo '<td><input type="text" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
			echo '<td>'.$product_name.'</td>';
			echo '<td>'.$currency.$product_price.'</td>';
			echo '<td>'.$currency.$subtotal.'</td>';
			//echo '<td><input type="checkbox" name="remove_code[]" value="'.$product_code.'" /></td>';
            echo '</tr>';
}//if($product_qty==0)	
			$total = ($total + $subtotal); //add subtotal to total var
        }//foreach ($_SESSION[
		
		//$grand_total = $total + $shipping_cost; //grand total including shipping cost
		$total_discount = $total * (1-$discount); //grand total including shipping cost
		$grand_total=$total_discount;
		foreach($taxes as $key => $value){ //list and calculate all taxes in array
				$tax_amount     = round($grand_total * $value);//10%for the first item
				$tax_item[$key] = $tax_amount;
				$grand_total   = $grand_total + $tax_amount;  //add tax val to grand total
		}
		
		$list_tax       = '';
		foreach($tax_item as $key => $value){ //List all taxes
			$list_tax .= $key. ' : '. $currency. sprintf("%01.2f", $value).'<br />';
		}
		$grand_total = $grand_total + $shipping_cost; //grand total including shipping cost
		$shipping_cost = ($shipping_cost)?'運費: '.$currency. sprintf("%10.2f", $shipping_cost).'<br />':'';
		$discount_print = ($discount)?'優待折扣價（95折） : '.$currency. sprintf("%10.2f", $total_discount).'<br />':'';
	}
    ?>	
	    	
    <tr>
        <td colspan="5">
            <span style="float:left;text-align: left;">
            <?php echo $discount_print.$list_tax.$shipping_cost ; ?>總價 : <?php echo sprintf("%01.2f", $grand_total);?>
            </span>
        </td>
    </tr>
    <tr>
        <td colspan="5">
            <a href="cart_index.php" class="button">新增餐點</a>
            <button type="submit">更新購物車</button>
            <a href="paypal-express-checkout" ><img src="images/btn_pay_with_paypal.png" width="179" height="36"></a>
        </td>
    </tr>
  </tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>

</body>
</html>
