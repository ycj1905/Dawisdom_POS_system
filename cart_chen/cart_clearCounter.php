<?php 

  $handle = fopen("counter.txt", "r"); 
  if(!$handle)
  { 
  		echo "could not open the file" ; }
   else
   {
		
		$counter=0;
		$handle = fopen("counter.txt", "w" ) ; 
		fwrite($handle,$counter) ;
		fclose ($handle) ;
		echo ("Your counter has been cleared successfully"); 
	}
?> 
