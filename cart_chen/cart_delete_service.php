<?php
session_start();

include_once("cart_config_cart.php");


	$_SESSION['service']=0;

     header("Refresh:0; url= cart_view_cart.php ");
?>