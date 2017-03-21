
<?php

if (!function_exists('readLine'))
		{
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
		}
			//function zoon End ooooooooooooooooooooooooooooooooooo



			//start*********************************
			//open $m_fp	「月報表」
			date_default_timezone_set('asia/taipei');
            $month = date("m");
			$month_file_name = './server_file/'.$month.'_m.txt';
			$m_fp = fopen($month_file_name, "r");
			
			$start_num=1;
			
			$line_old=	readLine($start_num,$m_fp);  //pointer stay the beginning
			fread($m_fp, 3) ;  //there are 3 header byte in the begining of file
			$k_num=( int ) fread($m_fp, 20) ;
			if ( $k_num<=0)
			{
				rewind($m_fp);
				$line_old=	readLine($start_num,$m_fp);  //pointer stay the beginning
				$k_num=( int ) fread($m_fp, 20) ;
			}
			
			$k_num_old= $k_num;
			
			
			$item_num=2;
			$line=	readLine($item_num,$m_fp);  //pointer stay the beginning
			$total_item_no=( int ) fread($m_fp, 20) ;
			
			//End ooooooooooooooooooooooooooooooooooo

			//start*********************************
			//Write the first record to  k1.txt
			//
			$k1_fp = fopen("./server_file/k1.txt", "w");
			$write_num=	$total_item_no+12 ;		
			rewind($m_fp);
			for ($i=1; $i <=$write_num; $i++)
					{
						$line=fgets($m_fp);
						fwrite($k1_fp, $line);
					}
			//End ooooWrite the first record to  k1.txtooooooooooooooooooooooooooooooo

			
			//start*********************************
			//purge  k.txt , write to k1.txt
			//
			$start_num=$write_num+1;
						
			while ($k_num>0)
			{
				readLine($start_num,$m_fp);  //pointer stay the beginning
				//fread($m_fp, 3) ;  //there are 3 header byte in the begining of file
				$k_num=( int ) fread($m_fp, 20) ;
								
				$item_num=$start_num+1;
				readLine($item_num,$m_fp);  //pointer stay the beginning
				$total_item_no=( int ) fread($m_fp, 20) ;
				
				if ($k_num == $k_num_old)
				{
					
					//start*********************************
					//Write the record to  k1.txt
					//
					
					$k_num_old= $k_num;
					
					
					$write_num=	$total_item_no+12 ;		
					$line_old=	readLine($start_num,$m_fp);  //pointer stay the beginning
					for ($i=1; $i <=$write_num; $i++)
							{
								$line=fgets($m_fp);
								//fwrite($k1_fp, $line);
							}
					//End ooooooooooooooooooooooooooooooooooo
					$start_num=$start_num+$write_num;
					
					
					$k_num=( int ) fread($m_fp, 20) ;
					
					 
				}
				else
				{
					
							
					//start*********************************
					//Write the record to  k1.txt
					//
					$k_num_old= $k_num;
										
					$write_num=	$total_item_no+12 ;		
					$line_old=	readLine($start_num,$m_fp);  //pointer stay the beginning
					for ($i=1; $i <=$write_num; $i++)
							{
								$line=fgets($m_fp);
								fwrite($k1_fp, $line);
							}
					//End ooooooooooooooooooooooooooooooooooo
					$start_num=$start_num+$write_num;
					$k_num=( int ) fread($m_fp, 20) ;
					
				}
			}//while ($k_num>0)
			fclose($m_fp);
			fclose($k1_fp);			
			//End purge         oooooooooooooooooooooooooooooo
			
			//start*********************************
			//copy k1.txt to k.txt
			
			$k1_fp = fopen("./server_file/k1.txt", "r");
			$m_fp = fopen($month_file_name, "w");
			while(!feof($k1_fp)) 
			{
			   $txt=fgets($k1_fp);
			   fwrite($m_fp, $txt);
			}
			
			fclose($m_fp);
			fclose($k1_fp);	
			//End ooooooooooooooooooooooooooooooooooo
			
			
			
			
			//function zoon start*********************************			
						
			
			//function readLine ($linenum,$fp)
		
		


?>
