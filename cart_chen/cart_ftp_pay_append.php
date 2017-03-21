<?php

if (isset($_POST['cart_ftp_pay']))
{
	$customer_no = $_POST['cart_ftp_pay'];
}
else
{
	$customer_no=1;
}




//read old.txt*****************
		$old_fp = fopen("./server_file/old_no_k.txt", "r");

		$old_name =  fread($old_fp, 20) ;
		fclose ($old_fp) ;
		
		$new_name=$customer_no.'.txt';		
		//if ($old_name!=$new_name)
		//{
			
			
			//$customer_no = $_POST['cart_ftp_pay'];
	
			//start*********************************
			//read "./server_file/customer_no_k.txt", "r"
					$fp = fopen("./server_file/customer_no_k.txt", "r");
					$customer_no_k = ( int ) fread($fp, 20) ;
					fclose ($fp) ;
					$customer_no_k=$customer_no_k+1;
			//End ooooooooooooooooooooooooooooooooooo
			
			//start*********************************
			//open顧客序號的「購物明細表」
			$print_file_name='./server_file/'.$customer_no.'.txt';	
				
			$fp = fopen("$print_file_name", "r+") or die("Unable to open file!");
			$txt=$customer_no_k."  - 已付帳序號***********************\r\n";
			rewind($fp);
			fwrite($fp, $txt);
			fclose($fp);
			//End ooooooooooooooooooooooooooooooooooo


			
			//start*********************************
			//open $m_fp	「月報表」
			date_default_timezone_set('asia/taipei');
            $month = date("m");
			$month_file_name = './server_file/'.$month.'_m.txt';
			$m_fp = fopen($month_file_name, "a");
			//End ooooooooooooooooooooooooooooooooooo
			
			
			//start*********************************
			//open $t_file_name 「已付帳明細表」 「廚房明細表」
			$txt=$customer_no_k."  - 已付帳序號***********************\r\n";
			$k_fp = fopen("./server_file/k.txt", "a");
			//End ooooooooooooooooooooooooooooooooooo
file_put_contents('./server_file/k.txt', file_get_contents("$print_file_name"), FILE_APPEND | LOCK_EX);
file_put_contents("$month_file_name", file_get_contents("$print_file_name"), FILE_APPEND | LOCK_EX);
/*
			
			//start*********************************
			//把已付帳序號寫入「已付帳明細表」及「月報表」
			fwrite($k_fp, $txt);
			fwrite($m_fp, $txt);
			//End ooooooooooooooooooooooooooooooooooo
			
			
			//start*********************************
			//把顧客序號的「購物明細表」寫入「已付帳明細表」及「月報表」
			while(!feof($fp)) 
			{
			   $txt=fgets($fp);
			   fwrite($k_fp, $txt);
			   fwrite($m_fp, $txt);
			}
			fclose($fp);
			fclose($k_fp);
			fclose($m_fp);
			//End ooooooooooooooooooooooooooooooooooo
			
			//start*********************************
			//purge 「已付帳明細表」 「廚房明細表」
			//require_once('cart_purge_kitchen.php');
			//require_once('cart_purge_month.php');
			//End ooooooooooooooooooooooooooooooooooo
*/			
			//start*********************************
			//update "./server_file/customer_no_k.txt", "r"
					$fp = fopen("./server_file/customer_no_k.txt", "w");  
					$data = "$customer_no_k" ;
					fwrite($fp, $data);
					fclose ($fp) ;
			//End ooooooooooooooooooooooooooooooooooo
			
			//start*********************************
			//write old.txt*****************
			$old_fp = fopen("./server_file/old_no_k.txt", "w");
			$txt=$customer_no.'.txt';
			fwrite($old_fp, $txt);
			fclose($old_fp);
			//End ooooooooooooooooooooooooooooooooooo
	

		//}//if ($old_name=$$print_file_name)

//header("Refresh:0; url= cart_index.php ");
// close connection



?>
