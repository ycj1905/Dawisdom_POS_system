
<?php

	
			
			//start*********************************
			//to get $customer_no_k and $total_item_no
			//
			$k_fp = fopen("./server_file/k.txt", "r");
			$read_num=1;
			$line_old=	readLine($read_num,$k_fp);  //pointer stay at the beginning of $line_num
			$total_item_no=( int ) fread($k_fp, 20) ;
			$read_num=2;
			$line=	readLine($read_num,$k_fp);  //pointer stay at the beginning of $line_num
			$total_item_no=( int ) fread($k_fp, 20) ;
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
			//End ooooooooooooooooooooooooooooooooooo
			
			//check if there is a repeat
			while (!feof($k_fp))
			{
				$line=fgets($k_fp); 
				if ($line == $line_old)
				{
				
				}
				else
				{
				$read_num=$write_num+1;
			$line_old=	readLine($read_num,$k_fp);  //pointer stay at the beginning of $line_num
			$total_item_no=( int ) fread($k_fp, 20) ;
			$read_num=$read_num+2;
			$line=	readLine($read_num,$k_fp);  //pointer stay at the beginning of $line_num
			$total_item_no=( int ) fread($k_fp, 20) ;
				$write_num = $read_num+$total_item_no +12 ;		
				
				for ($i=1; $i <=$write_num; $i++)
						{
							$line=fgets($k_fp);
							fwrite($k1_fp, $line);
						}
				}
			}//while
	  
			fclose($k_fp);
			fclose($k1_fp);			
			
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
				rewind($fp);
				for ($i=1; $i<=$linenum-1; $i++)
				{
					fgets ($fp);
				}
				
				$line = fgets($fp);
				
				rewind($fp);
				for ($i=1; $i<=$linenum-1; $i++)
				{
					fgets ($fp);
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
