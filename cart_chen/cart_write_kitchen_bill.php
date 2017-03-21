
<?php

	$customer_no = $_POST['cart_ftp_pay'];
	
			//start*********************************
			//read "./server_file/customer_no_k.txt", "r"
					$file_name = fopen("./server_file/customer_no_k.txt", "r");
					$customer_no_k = ( int ) fread($file_name, 20) ;
					fclose ($file_name) ;
					$customer_no_k=$customer_no_k+1;
			//End ooooooooooooooooooooooooooooooooooo
			
			//start*********************************
			//open顧客序號的「購物明細表」
			$print_file_name='./server_file/'.$customer_no.'.txt';	
			$file_name = fopen("$print_file_name", "r") or die("Unable to open file!");
			//End ooooooooooooooooooooooooooooooooooo
			
			//start*********************************
			//open $m_file_name	「月報表」
			date_default_timezone_set('asia/taipei');
            $month = date("m");
			$month_file_name = './server_file/'.$month.'_m.txt';
			$m_file_name = fopen($month_file_name, "a");
			//End ooooooooooooooooooooooooooooooooooo
			
			//start*********************************
			//open $t_file_name 「已付帳明細表」 「廚房明細表」
			$txt="已付帳序號: ".$customer_no_k."  ***********************\r\n";
			$k_file_name = fopen("./server_file/k.txt", "a");
			//End ooooooooooooooooooooooooooooooooooo
			
			//start*********************************
			//把已付帳序號寫入「已付帳明細表」及「月報表」
			fwrite($k_file_name, $txt);
			fwrite($m_file_name, $txt);
			//End ooooooooooooooooooooooooooooooooooo
			
			
			//start*********************************
			//把顧客序號的「購物明細表」寫入「已付帳明細表」及「月報表」
			while(!feof($file_name)) 
			{
			   $txt=fgets($file_name);
			   fwrite($k_file_name, $txt);
			   fwrite($m_file_name, $txt);
			}
			fclose($file_name);
			fclose($m_file_name);			
			fclose($k_file_name);
			//End ooooooooooooooooooooooooooooooooooo
			
			
			
			//start*********************************
			//update "./server_file/customer_no_k.txt", "r"
					$file_name = fopen("./server_file/customer_no_k.txt", "w");  
					$data = "$customer_no_k" ;
					fwrite($file_name, $data);
					fclose ($file_name) ;
			//End ooooooooooooooooooooooooooooooooooo
			
			//start*********************************
			//write old.txt*****************
			$old_file_name = fopen("./server_file/old_no_k.txt", "w");
			$txt=$customer_no.'.txt';
			fwrite($old_file_name, $txt);
			fclose($old_file_name);
			//End ooooooooooooooooooooooooooooooooooo

?>
