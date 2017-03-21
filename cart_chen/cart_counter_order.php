
<?php 
  if(!isset($_SESSION)){session_start();}

  $handle = fopen("counter_order.txt", "r"); 
  if(!$handle)
  { 
  		echo "could not open the file" ; }
   else
   {
		$counter = ( int ) fread ($handle,20) ;
		fclose ($handle) ;
		$counter++ ;
		$_SESSION['order']['number'] = $counter ; 
		$handle = fopen("counter_order.txt", "w" ) ; 
		fwrite($handle,$counter) ;
		fclose ($handle) ; 
	}

?> 

