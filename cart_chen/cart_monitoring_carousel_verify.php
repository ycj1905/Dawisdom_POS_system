

<?php
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
		require_once('cart_monitoring_carousel.php');
	}
	else
	{
		//header("Refresh:0; url= cart_index.php ");
		 require_once('cart_index.php');
	}


?>

