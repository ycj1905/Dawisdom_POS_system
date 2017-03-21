
<?php
	ob_start();
	session_start(); 
	include_once("cart_config_cart.php");
	$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	require('./cart_navigationBar.php');
?>
<br>
<br>
<br>
<br>

  
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  
       <!--<li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>-->
    </ol>

    <!-- Wrapper for slides -->
    
<?php
	if(($_SESSION['login'] == 1)) 
		{
			if($_SESSION['username'] == 'admin')
			{
			  echo '<h2 align="center">監控畫面</h2>';
			  echo '<div class="carousel-inner" align="center" role="listbox">';
			  echo '<div class="item active">';
			  echo '<img src="./cam_file/img0.jpg" alt="img0" width="256" height="256"> <br>';
			  echo '</div>';
				
				$i_total_img=50; //for ($i=1; $i <= $i_total_img;$i++)
				for ($i=1; $i <= $i_total_img;$i++)
				{
				   
				   echo '<div class="item">';
				   echo '<img src="./cam_file/img';
				   echo "$i";
				   echo '.jpg" alt="img';
				   echo "$i";
				   echo '" width="256" height="256"><br>';
				   echo '</div>';
				} 
			}
			else
			{
				echo '<h1>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo '<br>';
				
				echo '請用店主登入';
				require_once('cart_contact_login_input.php');
			}
		}
	else
	{
		$_SESSION['monitoring_carousel']='cart_monitoring_carousel.php';
		require_once('cart_contact_login_input.php');
	}
 ?>    
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



<script src="../../dist/js/bootstrap.min.js"></script>  
 <script>
  $('.carousel').carousel({
   interval: 1000
  });
 </script>        
