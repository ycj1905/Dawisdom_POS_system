<?php
session_start();

require("cart_config.php");

//update secction
if(isset($_POST["discount"]))
{
    $_SESSION['discount']=$_POST["discount"];
	unset ($_SESSION['d_discount']);
	unset ($_SESSION['d_service']);
	unset ($_SESSION['d_sales']);	
}

if(isset($_POST["service"]))
{
    $_SESSION['service']=$_POST["service"];	
	unset ($_SESSION['d_discount']);
	unset ($_SESSION['d_service']);
	unset ($_SESSION['d_sales']);
}
if(isset($_POST["sales"]))
{
    $_SESSION['sales']=$_POST["sales"];
	unset ($_SESSION['d_discount']);
	unset ($_SESSION['d_service']);
	unset ($_SESSION['d_sales']);	
}

//Delete secction     
	 
if(isset( $_SESSION['d_service']))
{
	$_SESSION['service']=0;
	
}		 

if(isset( $_SESSION['d_discount']))
{
	$_SESSION['discount']=0;
	
}

if(isset( $_SESSION['d_sales']))
{
	$_SESSION['sales']=0;
	
}	

header("Refresh:0; url= cart_view_cart.php ");
			 	 
?>
