<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dawisdom</title>
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
     
	  padding: 130px 0px 0 0;
  }
  .jumbotron {
      background-color: #ebec7a;
      color: #c61210;
	  padding: 40px 40px;
  }
  .company {
      color: #e0f090;
  }
  .bg-grey {
      background-color: #FC6;
  }
  .bg-grey1 {
      background-color: #bbbbbb;
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
  .char-pink {
      color: #FF33CC;
  }
  .char-red {
      color: #FF0000;
  }
  .logo-small {
      color: #f4511e;
      font-size: 100px;
  }
  .logo-small_blue {
      color: #00C;
      font-size: 50px;
  }
  .logo-small_1 {
      color: #FF3399;
      font-size: 100px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
     background-image: none;
     color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
   .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
   .navbar {
      margin-bottom: 0px;
      background-color: #F90;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
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
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
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
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
  
  </style>
</head>

<body  data-spy="scroll"  data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">navbar-header -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="">開啟或收束導覽列</span>
        <span class="icon-bar"></span>
                         
      </button>
    </div><!--navbar-header -->
    
<div class="collapse navbar-collapse" id="myNavbar">
   
        
     
      <ul class="nav navbar-nav navbar-left">
        <li><a href="index.html">首頁</a></li>
         <li><a href="play_movie.php">點餐影片</a></li>
       <!-- <li><a href="./cart_chen/cart_index.php">點餐菜單</a></li>
        <li><a href="./cart_chen/cart_view_cart.php">結帳單明細</a></li>
         
    <li><a href="./contact_login/contact_delete_DB_verify.php">產品移除</a></li>
        <li><a href="./cart_chen/cart_insert_DB_input_text.php">產品新增</a></li>
        <!--<li><a href="cart_insert_DB_input.php">新增產品</a></li>
        <li><a href="./cart_chen/cart_update_DB_input.php">修改產品</a></li>
        <li><a href="./contact_login/contact_index.php">登入</a></li>  -->
        <li><a href="./cart_chen/cart_qrcode_display.php">本站QR code</a></li>
        <li><a href="#">繁</a></li>
        <li><a href="#">簡</a></li>
        <li><a href="#">En</a></li>
      </ul>
     
     </div><!--char-pink bg-grey2 -->

     
    </div><!--collapse -->
  </div><!--container -->
</nav>




</body>
</html>

