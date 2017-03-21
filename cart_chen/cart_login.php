<!DOCTYPE html>
<html lang="en">
<body data-spy="scroll"  data-offset="60">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>註冊</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php
    ob_start();
	session_start(); 
	
//include config
     require_once('cart_config_login.php');

    $username = $_POST['username'];
	$password = $_POST['password'];
		//echo '$username: '.$username;
		//echo '<br>';
		//echo '$password: '.$password;
		//echo '<br>';

//we need to get product name and price from database.
    $statement = $mysqli->prepare("SELECT username, password FROM members WHERE username=? LIMIT 1");
    $statement->bind_param('s', $username);
    $statement->execute();
    $statement->bind_result($username_db, $password_db);
	
	while($statement->fetch())
	{ //while
		
		//fetch username1, $password1 from db 
        //echo '$username_db: '.$username_db;
		//echo '<br>';
		//echo '$password_db: '.$password_db;
		//echo '<br>';
	}

		//echo '$password: '.$password;
		//echo '<br>';

	if ($password==$password_db)
	{
		//header("Refresh:0; url= cart_monitoring_carousel.php ");
		$_SESSION['login'] = 1;
		echo '<div align="center">';
		echo '<h1>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '登入成功';
		echo '</h1>';
		echo '</div>';
		
		if (isset($_SESSION['update_DB']))
		{
		   unset ($_SESSION['update_DB']); 
		   require_once('cart_update_DB_input.php');
		}
		if (isset($_SESSION['insert_DB']))
		{
		   unset ($_SESSION['insert_DB']); 
		   require_once('cart_insert_DB_input.php');
		}
		if (isset($_SESSION['delete_DB']))
		{
		   unset ($_SESSION['delete_DB']); 
		   require_once('cart_delete_DB.php');
		}
		if (isset($_SESSION['monitoring_carousel']))
		{
		   unset ($_SESSION['monitoring_carousel']); 
		   require_once('cart_monitoring_carousel.php');
		}
		if (isset($_SESSION['ftp_pay']))
		{
		   unset ($_SESSION['ftp_pay']); 
		   require_once('cart_ftp_pay_input.php');
		}
		if (isset($_SESSION['view_kitchen']))
		{
		   unset ($_SESSION['view_kitchen']); 
		   require_once('cart_view_kitchen.php');
		}
		if (isset($_SESSION['view_pay_month']))
		{
		   unset ($_SESSION['view_pay_month']); 
		   require_once('cart_view_pay_month_input.php');
		}
		if (isset($_SESSION['view_pay_single']))
		{
		   unset ($_SESSION['view_pay_single']); 
		   require_once('cart_view_pay_single_input.php');
		}
		

	}
	else
	{
		echo '<h1>';
		echo '<br>';
		echo '<br>';
		
		
		echo '<div align="center">';

		
		//header("Refresh:0; url= cart_index.php ");
		echo '重新登入';
		 require_once('cart_login_input.php');
	}


?>
</div>
</h1>
</body>
</html>
