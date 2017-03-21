<?php
$currency = 'NT$'; //Currency Character or code

//MySql for local system
//$db_username 	= 'root';
//$db_password 	= '1234';
//$db_name 		= 'cart';
//$db_host 		= 'localhost';

//MySql for dawisdom below is not working for 'dawisdom_cart', but
//working for 'dawisdom_login'
//define('DBHOST','localhost');
//define('DBUSER','');
//define('DBPASS','');
//define('DBNAME','');

//MySql for dawisdom
$db_username 	= '';
$db_password 	= '';
$db_name 		= '';
$db_host 		= 'localhost';

//paypal settings
$PayPalMode 			= 'sandbox'; // sandbox or live
$PayPalApiUsername 		= 'account@gmail.com'; //PayPal API Username
$PayPalApiPassword 		= '979797979'; //Paypal API password
$PayPalApiSignature 	= 'AewouidSeoiewDradoZcgqH3hpacAokIiuNjAwoiedkew'; //Paypal API Signature
$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= 'http://yoursite.com/php-shopping-cart-master/paypal-express-checkout/'; //Point to paypal-express-checkout page
$PayPalCancelURL 		= 'http://yoursite.com/shopping-cart/paypal-express-checkout/cancel_url.html'; //Cancel URL if user clicks cancel

//Additional taxes and fees											
$HandalingCost 		= 0.00;  //Handling cost for the order.
$InsuranceCost 		= 0.00;  //shipping insurance cost for the order.
$discount           = 0.05; //discount
$ShippinDiscount 	= 0.00; //Shipping discount for this order. Specify this as negative number (eg -1.00)
$service            =0.1;
$sales_tax          =0.05;
$shipping_cost      = 0; //shipping cost

$taxes              = array( //List your Taxes percent here.
                            'service_charge' => 0.1, 
                            'sales_tax' => 0.05
                            );

//connection to MySql						
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
$pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
?>
