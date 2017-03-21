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
	if (!isset($_SESSION)) session_start(); 
	
//include config
     require_once('cart_config_login.php');
	 require('./cart_navigationBar.php');
	
	if(!empty($_POST['username']))
	{
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
				$_SESSION['username'] =$username;
		
				echo '<div align="center">';
				echo '<h1>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				
				echo '登入成功, 請繼續';
				echo '</h1>';
				echo '</div>';
		
			}
			else
			{
				echo '<div align="center">';
				echo '<h1>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '重新登入';
				echo '</div>';
				echo '</h1>';
				 
				require_once('cart_contact_login_input.php');
				
			}
	}
	else
	{
				echo '<div align="center">';
				echo '<h1>';
				echo '<br>';
				echo '<br>';
				echo '空的輸入、請重新輸入';
				echo '</div>';
				echo '</h1>';
			   require_once('cart_contact_login_input.php');
	}

?>

</body>
</html>
