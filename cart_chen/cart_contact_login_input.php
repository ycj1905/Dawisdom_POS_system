

<?php
//include config
if (!isset($_SESSION)) session_start();
require_once('cart_config_login.php');
require_once('./cart_navigationBar.php');

?>
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
      background-color: #66CCFF;
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
      text-align: center;
      margin: 3px 3;
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

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	
<div class="container">
<div align="center">  <!--<div align="center"> -->
	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="cart_contact_login.php" autocomplete="off">
				<h2>請登入</h2>
               				
				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="" tabindex="1">
				</div>

				<div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>
				
				<div class="form-group">
					<h4>
						 <a href='cart_contact_reset_password_input.php'>重設密碼?</a>
                    </h4>
				</div>
				
				
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="登入" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
			
            
            
            </form>
		</div>
	</div>

</div>

</div>  <!--<div align="center"> --> 
</body>
</html>
