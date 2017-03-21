<!DOCTYPE html>
<html lang="en">
<head>
  <title>dawisdom</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./bootstrap_css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="./bootstrap_js/jquery.min.js"></script>
  <script src="./bootstrap_js/bootstrap.min.js"></script>
<style>
  .char-white {
      color: #fff;
  }
  
  .button1 {
	border-radius: 12px;
	width: 250px;
	height: 80px;
  	background-color: rgba(255,102,0,1); /* orange */
    color: white;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
	font-family: Comic Sans MS,arial,helvetica,sans-serif,DFKai-sb;
}

.button1:hover {
    background-color: rgba(255,102,0,0.7); /* orange */
    color: white;
}
body {
    background-image: url("./img/kitchen_phone_p1.jpg");
    background-color: #cccccc;
	background-size: cover;
	background-position: center ;
	background-repeat: no-repeat;
	color: #d8d8d8;
	padding: 10em 0;
	text-align: center;
	position: relative;
}

  </style>
</head>

<body>
<div  class="container char-white">
    
<h1>
<?php
ob_start();
if (!isset($_SESSION)) session_start(); 
session_unset();
session_destroy();

$_SESSION['login'] = 0;
/*
if (isset($_COOKIE['www.dawisdom.com'])) 
{
    //unset($_COOKIE['www.dawisdom.com']);
   
    //setcookie('Hello', null, -1, '/');
    
    return true;
} else {
    return false;
}
*/
// if ($day!=$Stored_day) then unset customer_no
		date_default_timezone_set('Asia/Taipei');
		$day = date("Y-m-d");  //current day

		$fp = fopen("./cart_chen/server_file/day.txt", "r");
		//$Stored_day = fgets($fp) ;
		$Stored_day =  fread($fp, 20) ;
		fclose ($fp) ;
		if ($day!=$Stored_day)
		{
			require('./unset_customer_no.php');
			
		}

// set customer_no
		//read "./server_file/customer_no.txt", "r"
		$fp = fopen("./cart_chen/server_file/customer_no.txt", "r");
		$customer_no = ( int ) fread($fp, 20) ;
		fclose ($fp) ;
	
		$customer_no=$customer_no+1;
			
	    //update "./server_file/customer_no.txt", "r"
		$fp = fopen("./cart_chen/server_file/customer_no.txt", "w");  
		$data = "$customer_no" ;
		fwrite($fp, $data);
		fclose ($fp) ;
		
	
	//write 1.txt,2.txt,........

	
	$file_name="./cart_chen/server_file/".$customer_no.".txt";
	$fp = fopen($file_name, "w"); 
  	$data = "" ;
	fwrite($fp, $data);
	fclose ($fp);
		
			
date_default_timezone_set('Asia/Taipei');
//$date=date('l jS \of F Y h:i:s A');
//echo $date;echo "<br>";s
$day = date("Y-m-d");  //current day
echo '序號：  '.$customer_no;	
echo '<form method="post" action="./cart_chen/cart_index.php">';
echo ' <input type="hidden" name="customer_no"  value='.$customer_no;
echo ' >';
echo ' <input class="button1"  type="submit" value="開始點餐">';
echo ' </form>';
echo "<br>";
echo $day;
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
?>
</h1>
</div>


</body>
</html>