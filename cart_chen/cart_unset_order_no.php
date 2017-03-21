

<?php
// unset all the $_SSESSIOn[]variables and cookie

    session_start();
    session_unset();
    session_destroy();
//echo "sesssion variables were destroied.";	

//write "./server_file/customer_no.txt"
			$file_name = fopen("./server_file/customer_no.txt", "w");  
			
			$data = "0" ;
			fwrite($file_name, $data);
			fclose ($file_name) ;




    //reset day
	date_default_timezone_set('asia/taipei');
	$day = date("Y-m-d");

    $file_name = fopen("./server_file/day.txt", "w"); 
  	  	
	  	
	$data = "$day" ;
	fwrite($file_name, $data);
	fclose ($file_name);
	
//delete cart_view_cart's print file

	$i=1;
	$file_origin="./server_file/".$i.".txt";
	
	while((file_exists($file_origin))) 
	{
   		
		unlink("$file_origin");
		$i++;
		$file_origin="./server_file/".$i.".txt";
		
	}//wile
	
//header("Refresh:0; url= cart_view_cart.php ");

?>
