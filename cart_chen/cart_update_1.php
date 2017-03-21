<?php
session_start();
require("cart_config.php");

echo 'This is a test';
header("Refresh:0; url= cart_view_cart.php ");
?>
