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
			echo $start_num. '_____$start_num';
			echo '<br>';
			$line_old=	readLine($start_num,$k_fp);  //pointer stay the beginning
			fread($k_fp, 3) ;  //there are 3 header byte in the begining of file
			$k_num=( int ) fread($k_fp, 20) ;
			if ( $k_num<=0)
			{
				rewind($k_fp);
				$line_old=	readLine($start_num,$k_fp);  //pointer stay the beginning
				$k_num=( int ) fread($k_fp, 20) ;
			}
			echo $k_num. '_____$k_num_first';
			echo '<br>';
			
			$k_num_old= $k_num;
			echo $k_num_old. '_____$k_num_old';
			echo '<br>';
			
			$item_num=2;
			$line=	readLine($item_num,$k_fp);  //pointer stay the beginning
			$total_item_no=( int ) fread($k_fp, 20) ;
			echo $total_item_no. '_____$total_item_no_first';
			echo '<br>';
			//End ooooooooooooooooooooooooooooooooooo

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

			
			$start_num=$write_num+1;
			echo $start_num. '_____$start_num***outside while***';
			echo '<br>';
			
			
			while ($k_num>0)
			{
				readLine($start_num,$k_fp);  //pointer stay the beginning
				//fread($k_fp, 3) ;  //there are 3 header byte in the begining of file
				$k_num=( int ) fread($k_fp, 20) ;
				echo $k_num. '_____$k_num_new';
				echo '<br>';
				echo $k_num_old. '_____$k_num_old';
				echo '<br>';
				
				$item_num=$start_num+1;
				readLine($item_num,$k_fp);  //pointer stay the beginning
				$total_item_no=( int ) fread($k_fp, 20) ;
				echo $total_item_no. '_____$total_item_no';
				echo '<br>';
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
					echo $start_num. '_____$start_num';
					echo '<br>';
					
					$k_num=( int ) fread($k_fp, 20) ;
					echo $k_num. '_____$k_num';
					echo '<br>';
					 
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
					echo $start_num. '_____$start_num';
					echo '<br>';
					
					$k_num=( int ) fread($k_fp, 20) ;
					echo $k_num. '_____$k_num';
					echo '<br>';
				}
			}//while ($k_num>0)




/*			
			//check if there is a repeat
			//while (!feof($fp))
			{
				$read_num=$write_num+1;
				$line=	readLine($read_num,$k_fp);//pointer stay the beginning
				echo $line_old. 'old line';
				echo '<br>';
				echo $line. 'line';
				echo '<br>'; 
				if ($line == $line_old)
				{
				/*	
					$read_num=$write_num+1;
					$line_old="";//pointer stay the beginning
					$total_item_no=( int ) fread($k_fp, 20) ;
					$read_num=$read_num+2;
					$line=	readLine($read_num,$k_fp);//pointer stay the beginning
					$total_item_no=( int ) fread($k_fp, 20) ;
					$write_num = $read_num+$total_item_no +12 ;		
					
					for ($i=1; $i <=$write_num; $i++)
							{
								$line=fgets($k_fp);
								//fwrite($k1_fp, $line);
							}
				
				}
				else
				{
					$read_num=$write_num+1;
					$line_old=	readLine($read_num,$k_fp);//pointer stay the beginning
					echo $line_old. '____old line 0n loop';
					echo '<br>';
					$read_num=$read_num+1;
					$line=	readLine($read_num,$k_fp);//pointer stay the beginning
					$total_item_no=( int ) fread($k_fp, 20) ;
					echo $total_item_no. '_____$total_item_no';
				    echo '<br>';
					$write_num = $total_item_no +12 ;		
					$read_num=$read_num-2;
					$line=	readLine($read_num,$k_fp);//pointer stay the beginning
					
					for ($i=1; $i <=$write_num; $i++)
							{
								$line=fgets($k_fp);
								fwrite($k1_fp, $line);
							}
					$read_num=$write_num+1;
				    $line=	readLine($read_num,$k_fp);//pointer stay the beginning
				    echo $line_old. 'old line';
				    echo '<br>';
				    echo $line. 'line';
				    echo '<br>'; 
					
					
					//$write_num=$write_num-1;
				}
			}//while
*/	  
			fclose($k_fp);
//			fclose($k1_fp);			
			
			//function zoon start*********************************			
			//function advanceLine ($linenum,$fp)
			function backwardLine ($linenum,$fp)
			{
				$line_num_offset=0;
				$line_num=0;
				$line = fgets ($fp);
				while (!feof($fp) && ($line=="\r\n"))
				{
					$line_num_offset++;
					fgets ($fp);
				}
				//echo $line_num_offset."    ____line_num_offset";
				//echo '<br>';
							
				rewind($fp);
				$line1="";
				while (!feof($fp) && ($line1!= $line))
				{
					$line_num++;
					$line1=fgets ($fp);
				}
				//backward $linenum
				rewind($fp);
				$line_num=$line_num-$linenum;
				for ($i=1; $i<=$line_num; $i++)
				{
					fgets ($fp);
				}
				
				$line=	readLine($line_num,$fp);
				//echo $line_num."   ___line_num";
				//echo '<br>';
				
				return $line;
			}
			
           //function advanceLine ($linenum,$fp)
			function advanceLine ($linenum,$fp)
			{
				$line_num_offset=0;
				$line_num=0;
				$line = fgets ($fp);
				while (!feof($fp) && ($line=="\r\n"))
				{
					$line_num_offset++;
					fgets ($fp);
				}
				//echo $line_num_offset."    ____line_num_offset";
				//echo '<br>';
							
				rewind($fp);
				$line1="";
				while (!feof($fp) && ($line1!= $line))
				{
					$line_num++;
					$line1=fgets ($fp);
				}
				//advance $linenum
				for ($i=1; $i<=$linenum; $i++)
				{
					fgets ($fp);
				}
				
				$line_num=$line_num-$line_num_offset+$linenum;
				$line=	readLine($line_num,$fp);
				//echo $line_num."   ___line_num";
				//echo '<br>';
				
				return $line;
			}
			
			
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
		

/*
			$k_fp = fopen("./server_file/k.txt", "r");
			//rewind($k_fp);
			$line_num=5;
			$line=	readLine($line_num,$k_fp);  //pointer stay at the beginning of $line_num
			echo $line;
			echo '<br>';
			$line_num_advance=2;
			$line=advanceLine ($line_num_advance,$k_fp);
			echo $line;
			echo '<br>';
			$line_num_backward=3;			
			$line=backwardLine ($line_num_backward,$k_fp);
			echo $line;
			echo '<br>';

*/

?>
</body>
</html>