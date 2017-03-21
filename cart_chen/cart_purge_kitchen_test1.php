<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css"></head>
<body>


<?php

	
			
			//start*********************************
			//to get $customer_no_k and $total_item_no
			//
			$k_fp = fopen("./server_file/k.txt", "r");
			$start_num=1;
			
			//$line_old=	readLine($start_num,$k_fp);  //pointer stay the beginning
			fread($k_fp, 3) ;  //there are 3 header byte in the begining of file
			$k_num=( int ) fread($k_fp, 20) ;
			
			
			$k_num_old= $k_num;
			
			
			$item_num=2;
			//$line=	readLine($item_num,$k_fp);  //pointer stay the beginning
			$total_item_no=( int ) fread($k_fp, 20) ;
			
			//End ooooooooooooooooooooooooooooooooooo
/*
			//start*********************************
			//Write the first record to  k1.txt
			//
			$k1_fp = fopen("./server_file/k1.txt", "w");
			$write_num=	$total_item_no+12 ;		
			rewind($k_fp);
			for ($i=1; $i <=$write_num; $i++)
					{
						$line=fgets($k_fp);
						fwrite($k1_fp, $line);
					}
			//End ooooWrite the first record to  k1.txtooooooooooooooooooooooooooooooo

			
			//start*********************************
			//purge  k.txt , write to k1.txt
			//
			$start_num=$write_num+1;
						
			while ($k_num>0)
			{
				readLine($start_num,$k_fp);  //pointer stay the beginning
				//fread($k_fp, 3) ;  //there are 3 header byte in the begining of file
				$k_num=( int ) fread($k_fp, 20) ;
								
				$item_num=$start_num+1;
				readLine($item_num,$k_fp);  //pointer stay the beginning
				$total_item_no=( int ) fread($k_fp, 20) ;
				
				if ($k_num == $k_num_old)
				{
					
					//start*********************************
					//Write the record to  k1.txt
					//
					
					$k_num_old= $k_num;
					
					
					$write_num=	$total_item_no+12 ;		
					$line_old=	readLine($start_num,$k_fp);  //pointer stay the beginning
					for ($i=1; $i <=$write_num; $i++)
							{
								$line=fgets($k_fp);
								//fwrite($k1_fp, $line);
							}
					//End ooooooooooooooooooooooooooooooooooo
					$start_num=$start_num+$write_num;
					
					
					$k_num=( int ) fread($k_fp, 20) ;
					
					 
				}
				else
				{
					
							
					//start*********************************
					//Write the record to  k1.txt
					//
					$k_num_old= $k_num;
										
					$write_num=	$total_item_no+12 ;		
					$line_old=	readLine($start_num,$k_fp);  //pointer stay the beginning
					for ($i=1; $i <=$write_num; $i++)
							{
								$line=fgets($k_fp);
								fwrite($k1_fp, $line);
							}
					//End ooooooooooooooooooooooooooooooooooo
					$start_num=$start_num+$write_num;
					$k_num=( int ) fread($k_fp, 20) ;
					
				}
			}//while ($k_num>0)
			fclose($k_fp);
			fclose($k1_fp);			
			//End purge         oooooooooooooooooooooooooooooo
			
			//start*********************************
			//copy k1.txt to k.txt
			
			$k1_fp = fopen("./server_file/k1.txt", "r");
			$k_fp = fopen("./server_file/k.txt", "w");
			while(!feof($k1_fp)) 
			{
			   $txt=fgets($k1_fp);
			   fwrite($k_fp, $txt);
			}
			
			fclose($k_fp);
			fclose($k1_fp);	
			//End ooooooooooooooooooooooooooooooooooo
*/			
			
			
			
			//function zoon start*********************************			
						
			
			//function readLine ($linenum,$fp)
			function readLine ($linenum,$fp) 
			{
				if  ($linenum==1)
				{
					rewind($fp);
					$line = fgets($fp);
					
				}
				else
				{
					rewind($fp);
					for ($i=1; $i<=$linenum-1; $i++)
					{
						fgets ($fp);
					}
					$line = fgets($fp);
				}
				
				if  ($linenum==1)
				{
					rewind($fp);
				}
				else
				{
					rewind($fp);
					for ($i=1; $i<=$linenum-1; $i++)
					{
						fgets ($fp);
					}
				}
				
				return $line;
			} //readLine ($linenum,$fp)
			//function zoon End ooooooooooooooooooooooooooooooooooo
		


?>

</body>
</html>