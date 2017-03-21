

<?php
// unset all the $_SSESSIOn[]variables and cookie
    session_start();
    session_unset();
    session_destroy();
//echo "sesssion variables were destroied.";	

//write "./server_file/customer_no.txt"
	$fp = fopen("./cart_chen/server_file/customer_no.txt", "w");  
	$data = "0" ;
	fwrite($fp, $data);
	fclose ($fp) ;

//write "./server_file/day.txt", "w"
	date_default_timezone_set('asia/taipei');
	$day = date("Y-m-d");
    $fp = fopen("./cart_chen/server_file/day.txt", "w"); 
  	$data = "$day" ;
	fwrite($fp, $data);
	fclose ($fp);


//update "./server_file/customer_no_k.txt", "r"
		$fp = fopen("./cart_chen/server_file/customer_no_k.txt", "w");  
		$data = "0" ;
		fwrite($fp, $data);
		fclose ($fp) ;	
//update t.txt
   $t_fp = fopen("./cart_chen/server_file/k.txt", "w");
   $txt="";
   fwrite($t_fp, $txt);
   fclose($t_fp);

//reset old.txt
			$old_fp = fopen("./cart_chen/server_file/old_no_k.txt", "w");
			$txt="12345";
			fwrite($old_fp, $txt);
			fclose($old_fp);
	


//delete 1.txt, 2.txt

	$i=1;
	$file_origin="./cart_chen/server_file/".$i.".txt";
	
	while((file_exists($file_origin))) 
	{
   		unlink("$file_origin");
		$i++;
		$file_origin="./cart_chen/server_file/".$i.".txt";
	}//wile



?>
