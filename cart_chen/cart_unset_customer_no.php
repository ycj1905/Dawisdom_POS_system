

<?php
// unset all the $_SSESSIOn[]variables and cookie
    //session_start();
    session_unset();
    session_destroy();
//echo "sesssion variables were destroied.";	

//write "./server_file/customer_no.txt"
	$file_name = fopen("./server_file/customer_no.txt", "w");  
	$data = "1" ;
	fwrite($file_name, $data);
	fclose ($file_name) ;

//write "./server_file/day.txt", "w"
	date_default_timezone_set('asia/taipei');
	$day = date("Y-m-d");
    $file_name = fopen("./server_file/day.txt", "w"); 
  	$data = "$day" ;
	fwrite($file_name, $data);
	fclose ($file_name);
	
//delete 1.txt, 2.txt

	$i=1;
	$file_origin="./server_file/".$i.".txt";
	
	while((file_exists($file_origin))) 
	{
   		unlink("$file_origin");
		$i++;
		$file_origin="./server_file/".$i.".txt";
	}//wile

//delete 1_no.txt, 2_no.txt
		
	$i=1;
	$file_name="./server_file/".$i."_no.txt";
	
	while((file_exists($file_name))) 
	{
   		unlink("$file_name");
		$i++;
		$file_name="./server_file/".$i."_no.txt";
	}//wile

//update $initial_customer_no
	$customer_no = 1;
	$initial_customer_no="./server_file/".$customer_no . "_no.txt";
			
	$file_name = fopen($initial_customer_no, "w");
	$data = 1 ;
	fwrite($file_name, $data);
	fclose ($file_name) ;	

	
//header("Refresh:0; url= cart_view_cart.php ");

?>
