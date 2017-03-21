<?php 
ob_start();
if (!isset($_SESSION)) session_start();
require_once('cart_config_login.php');
require('./cart_navigationBar.php');

?>
<!DOCTYPE html>
<html lang="en">
<body data-spy="scroll"  data-offset="60">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>重設密碼</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>



<?php
//if logged in redirect to members page
//if( $user->is_logged_in() ){ header('Location: contact_memberpage.php'); }

//if form has been submitted process it
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
		
				require_once('cart_contact_reset_password.php');
				exit;		
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
				 
				require_once('cart_contact_reset_password_input.php');
				
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
			   require_once('cart_contact_reset_password_input.php');
	}

?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>重設密碼</h2>
				
				<hr>

				

				<div class="form-group">
					<input type="username" name="username" id="username" class="form-control input-lg" placeholder="輸入使用者名稱:" value="" tabindex="1">
				</div>
				
                <div class="form-group">
					<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
				</div>


				<hr>
				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="啟動重設密碼" class="btn btn-primary btn-block btn-lg" tabindex="2"></div>
				</div>
			</form>
		</div>
	</div>


</div>

</body>
</html>
