

<?php
//session_start();  // for independent test


// set customer_no
		//read "./server_file/customer_no.txt", "r"
		$file_name = fopen("./server_file/customer_no.txt", "r");
		$customer_no = ( int ) fread($file_name, 20) ;
		fclose ($file_name) ;
	
		$customer_no=$customer_no+1;
			
	    //update "./server_file/customer_no.txt", "r"
		$file_name = fopen("./server_file/customer_no.txt", "w");  
		$data = "$customer_no" ;
		fwrite($file_name, $data);
		fclose ($file_name) ;
			
			
		//create "./server_file/$customer_no+1_no.txt"
		$data = $customer_no ;
		$initial_customer_no=$data . "_no.txt";
		$file_name = fopen("./server_file/" . $initial_customer_no,"w");
		fwrite($file_name, $data);
		fclose ($file_name) ;
			
//echo 'customer_no:     '. $customer_no;

?>
