<?php
    session_start();
    session_unset();
    session_destroy();
	
	//back to return url
  	$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):'';
	//echo $return_url ;
	header("Refresh:0; url= $return_url ");
?>