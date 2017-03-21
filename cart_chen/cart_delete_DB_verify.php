

<?php
	 
	require('../contact_login/includes/config.php');

//check if it is the owner
if( $user->is_logged_in() )
{ 
	$user_name=$_SESSION['username'];
	$owner_name='aaaa';

	if ($user_name!=$owner_name)
	{
		echo "店主專頁 -- 請登入<br>";
		header("Refresh:2; url= ../contact_login/contact_login.php ");
	}
	
}//yes-if( $user->is_logged_in() )
else
{
 	echo "店主專頁 -- 請登入<br>";
	header("Refresh:2; url= ../contact_login/contact_login.php ");

}//else-if( $user->is_logged_in() )

header("Refresh:0; url= ./cart_delete_DB_input.php ");
?>
