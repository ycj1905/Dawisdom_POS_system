<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html>
<html lang="en">
<head>
  <title>已付帳單明細</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./bootstrap_css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="./bootstrap_js/jquery.min.js"></script>
  <script src="./bootstrap_js/bootstrap.min.js"></script>
<style>
 .char-brown {
      color: #900;
	  
  }
  .char-padding {
     
	  padding: 50px 0px 0 0;
  }
  .bg-grey2 {
      background-color: #3399CC;
  }
  .bg-grey3 {
      background-color: #F0F0F0;
  }
 
  .char-blue {
      color: #009;
  }
  
  .panel {
      border: 5px solid #66CCFF; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
	  
  }
  .col-sm-4 {
        font-size: 25px !important;
	   margin: 3px 3;
    }
  .pay {
	 	 color: #222;
        font-size: 20px !important;
	   
    }
  
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #960000;
      z-index: 9999;
      border: 0;
      font-size: 16px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
  }
     .navbar-lang {
      margin-bottom: 0;
      background-color: #300;
	  color: #600;
      z-index: 9999;
      border: 0;
      font-size: 10px !important;
      
      letter-spacing: 0px;
      border-radius: 0;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  
  
  </style>
</head>


<div class="container pay bg-grey3">
<?php
			//read $print_file_name
			
			$single=$_POST["pay_single"];
			$file = './server_file/'.$single.'.txt';
				
			if (file_exists($file))
			{
				$file_name = fopen($file, "r");
				// Output one line until end-of-file
				while(!feof($file_name)) 
				{
				   echo fgets($file_name) . "<br>";
				}//wile
				fclose($file_name);
			}
			else
			{
				echo $file." 不存在";
				require_once('cart_view_pay_single_input.php');
			}

/*			
			echo '<h2>';
			echo '<form method="post" action="cart_print_pay_single.php">';
			echo ' <input type="hidden" name="single" size="10" value='.$single;
			echo ' >';
			echo ' <input type="submit"  value="打印" style= "width:120px; height:50px; font-size:35px;">';
			echo ' </form>';
			echo '<br>';
			echo '</h2>';
*/
			echo '<h2>';
			echo '<a href="cart_index.php">重回主畫面</a>';
			echo '</h2>';
			


?>

 		 
    </div>
</html>
