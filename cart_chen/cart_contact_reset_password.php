<?php 
ob_start();
if (!isset($_SESSION)) session_start();
require_once('cart_config_login.php');
//require('./cart_navigationBar.php');



//if form has been submitted process it
if(isset($_POST['hidden']))
{

	//basic validation
	if(strlen($_POST['password']) < 3){
		$error[] = 'Password is too short.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = '請輸入確認碼，確認碼必須大於3個字母.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = '密碼與確認碼不符';
	}

	//if no errors have been created carry on
	if(!isset($error))
	{

			if (isset($_SESSION['username']))$username=$_SESSION['username'];
			if (isset($_POST['username']))$username = $_POST['username'];
			$password=$_POST['password'];
			//echo '$username: '.$username;
		    //echo '<br>';
		    //echo '$password: '.$password;
		    //echo '<br>';
		
			$sql = "UPDATE members SET password= '$password' WHERE username='$username' ";
			// Prepare statement
			$stmt = $mysqli->prepare($sql);
			// execute the query
			$stmt->execute();
			// echo a message to say the UPDATE succeeded
			//echo  " records UPDATED successfully";
	}
		
header("Refresh:0; url= cart_index.php ");
}

//define page title
$title = 'Reset password';



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
<br>
<br>
<br>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
<form role="form" method="post" action="cart_contact_reset_password.php" autocomplete="off">

					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="1">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="Confirm Password" tabindex="1">
							</div>
                            <div class="form-group">
								<input type="hidden" name="hidden" >
							</div>
						</div>
					</div>
					
					<hr>
					<div class="row">
						<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Change Password" class="btn btn-primary btn-block btn-lg" tabindex="3"></div>
					</div>
				</form>


		</div>
	</div>


</div>
