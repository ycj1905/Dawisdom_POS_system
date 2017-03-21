<?php 
	    ob_start();
	session_start(); 
	
//include config
     require_once('cart_config_login.php');
	 require('cart_navigationBar.php');
?>

<!DOCTYPE html>
<html lang="en">
<body data-spy="scroll"  data-offset="60">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>註冊</title>
<link href="../contact_login/style/style.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<br>
<br>
<br>
<br>

<?php 


//

//
//if logged in redirect to members page
/*
if( $user->is_logged_in() )
{ 
	
	//header('Location: contact_memberpage.php');// go to member page
	header("Refresh:0; url= contact_memberpage.php ");
}
*/
//
//if there is any form has been submitted, then process this section
//
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	
	//very basic username validation
	if(strlen($_POST['username']) < 3){
		$error[] = '帳號必須大於3個字母.';
	} else {
		$stmt = $db->prepare('SELECT username FROM members WHERE username = :username');
		$stmt->execute(array(':username' => $_POST['username']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['username'])){
			$error[] = '帳號已有人使用';
		}

	}
	//very basic password validation
	$password=$_POST['password'];
	
	if(strlen($_POST['password']) < 3){
		$error[] = '請輸入密碼，密碼必須大於3個字母.';
	}

	if(strlen($_POST['passwordConfirm']) < 3){
		$error[] = '請輸入確認碼，確認碼必須大於3個字母.';
	}

	if($_POST['password'] != $_POST['passwordConfirm']){
		$error[] = '密碼與確認碼不符';
	}

	//very basic email validation
	$email=$_POST['email'];
	
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	    $error[] = '請輸入正確的信箱';
	} else {
		$stmt = $db->prepare('SELECT email FROM members WHERE email = :email');
		$stmt->execute(array(':email' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if(!empty($row['email'])){
			$error[] = '信箱已申請過';
		}

	}

     //
	//check the result of the very basic validation
	//
	if(!isset($error))
	{//if $error is not set ----Start here
		//echo '註冊輸入完畢';
		
//insert into db=longin  record= members

// begin the transaction  
			$pdo->beginTransaction();
			// our SQL statememtns
			$pdo->exec("INSERT INTO members (username, password, email) VALUES ('$username', '$password', '$email' )");
			// commit the transaction
			$pdo->commit();
			echo "New record created successfully";	
		
			 // go back to cart_update_DB_input.php
			 //require_once('../contact_login/cart_insert_DB_input.php');
	
	}

}//if(isset($_POST['submit']))



//define page title
$title = '註冊';



//include header template
//require('../contact_login/layout/header.php');

?>

<!-- -->
<!--Start: Major Container-->
<!-- -->
<div class="container">
	<span> &nbsp <br></span>
    <span> &nbsp <br></span>
    <span> &nbsp <br></span>
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
<!-- -->
<!--Start: Major rgistration form-->
<!-- -->

<br>

<form role="form" method="post" action="" autocomplete="off">
				<h1>註冊</h1>
                <h3>
				<p>已是會員? <a href='cart_contact_login_input.php'>登入</a></p>
				</h3>

				
				<div class="form-group">
					<input type="text" name="username" id="username" class="form-control input-lg" placeholder="帳號" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
				</div>
				<div class="form-group">
					<input type="email" name="email" id="email" class="form-control input-lg" placeholder="信箱" value="<?php if(isset($error)){ echo $_POST['email']; } ?>" tabindex="2">
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="password" id="password" class="form-control input-lg" placeholder="密碼" tabindex="3">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="form-group">
							<input type="password" name="passwordConfirm" id="passwordConfirm" class="form-control input-lg" placeholder="再輸入一次密碼" tabindex="4">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="註冊" class="btn btn-primary btn-block btn-lg" tabindex="5"></div>
				</div>
                
</form>
<!-- -->
<!--End: Major rgistration form-->
<!-- -->
		</div> <!-- col -->
	</div><!-- row-->
</div><!-- container-->
<!-- -->
<!--End: Major Container-->
<!-- -->

</body>
</html>

