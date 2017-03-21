<?php
// page1.php
ob_start();
session_start();
ob_end_flush();

date_default_timezone_set("Asia/Taipei");

echo "Current time:  ";
echo date('m/d/y h:i:s a', time());
echo "<br>";
echo 'Welcome to page #1';
echo "<br>";
$_SESSION['favcolor'] = 'green';
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();

echo "Current time:  ";
//echo $_SESSION['time'];
echo date('m/d/y h:i:s a', $_SESSION['time']);
echo "<br>";
echo  $_SESSION['time'];
// Works if session cookie was accepted
echo '<br /><a href="session_test_1.php">session_test_1</a>';

// Or maybe pass along the session id, if needed
//echo '<br /><a href="page2.php?' . SID . '">page 2</a>';
echo "<br>";
$id= "aaa";
echo '$id =  '.$id;
echo "<br>";
$_SESSION['cart'][$id] = 20;
echo '[$id] = 20=  '.$_SESSION['cart'][$id];
echo "<br>";
echo '["aaa"] = 20=  '.$_SESSION['cart']["aaa"];
echo "<br>";

$_SESSION['cart'] = array();
$_SESSION['cart'][$id] = array( 'foo', 42);
echo '[$id] = array1=  '.$_SESSION['cart'][$id][1];
echo "<br>";

$_SESSION['cart'] = array();
$_SESSION['cart'][$id] = array('type' => 'foo', 'quantity' => 42);
echo '[$id]"quantity"] ='.$_SESSION['cart'][$id]['quantity'];
echo "<br>";
$_SESSION['cart'][$id]['quantity']++; // another of this item to the cart
echo '[$id]"quantity"]++ = '.$_SESSION['cart'][$id]['quantity'];

?>