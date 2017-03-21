<?php

 			$customer_no = $_POST['file'];
			
			//start*********************************
			//conect dawisdom ftp
			$ftp_server = "ftp.dawisdom.com";
			//$ftp_server = "69.195.124.74";
			$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
			$login = ftp_login($ftp_conn, "hwafuchen@dawisdom.com", "Bluehost@5773988");
			ftp_pasv($ftp_conn, true);
			//End ooooooooooooooooooooooooooooooooooo
			
			//start*********************************
			//download 1.txt, 2.txt,...
			$file=$customer_no.'.txt';
			$local_file = "./local_file/$file";
			$server_file = "./cart_chen/server_file/$file";
			//if (ftp_get($ftp_conn, $local_file, $server_file, FTP_IMAGE))
			if (ftp_get($ftp_conn, $local_file, $server_file,FTP_IMAGE))
			  {  //echo "Successfully download $file."; 
			   }
			else
			  {  echo "Error download $file.";  }
			//End ooooooooooooooooooooooooooooooooooo
/*			
			//start*********************************
			//download 1_m.txt, 2_m.txt,...
			date_default_timezone_set('asia/taipei');
            $month = date("m");
			$file=$month.'_m.txt'; 
			$local_file = "./local_file/$file";
			$server_file = "./cart_chen/server_file/$file";
			//if (ftp_get($ftp_conn, $local_file, $server_file, FTP_IMAGE))
			if (ftp_get($ftp_conn, $local_file, $server_file,FTP_IMAGE))
			  {  //echo "Successfully download $file."; 
			   }
			else
			  {  echo "Error download $file.";  }
			//End ooooooooooooooooooooooooooooooooooo
			
			//start*********************************
			//download k.txt  「已付帳明細表」 「廚房明細」
			$file='k.txt'; 
			$local_file = "./local_file/$file";
			$server_file = "./cart_chen/server_file/$file";
			//if (ftp_get($ftp_conn, $local_file, $server_file, FTP_IMAGE))
			if (ftp_get($ftp_conn, $local_file, $server_file,FTP_IMAGE))
			  {  //echo "Successfully download $file.";  
			  }
			else
			  {  echo "Error download $file.";  }
			//End ooooooooooooooooooooooooooooooooooo
			
			//start*********************************
			// close connection
			ftp_close($ftp_conn);
			//End ooooooooooooooooooooooooooooooooooo
*/

/*			
			//start*********************************
			//using pi to print 1_m.txt, 2_m.txt,...
			$file=$customer_no.'.txt';
			$result = shell_exec("sudo ./print.py ./local_file/$file");
			echo "<pre>$result</pre>";
			//End ooooooooooooooooooooooooooooooooooo
*/ 
  
  
  

header("Refresh:2; url= cart_index.php ");
// close connection

?>
