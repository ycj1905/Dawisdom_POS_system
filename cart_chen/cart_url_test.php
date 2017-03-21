<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css"></head>
<body>
<h1 align="center">url_test</h1>
<div class="cart-view-table-back">
<form method="post" action="cart_update.php">

return_url:<input type="submit" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo "current_url;" ?>" />
</form>
</div>

</body>
</html>
