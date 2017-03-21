<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View shopping cart</title>
<link href="style/style.css" rel="stylesheet" type="text/css"></head>
<body>


<?php
/*			
			//start*********************************
			//to get $customer_num_k and $total_item_num
			//
			$k_fp = fopen("./server_file/k.txt", "r");
			$customer_num_k=( int ) fread($k_fp, 20) ;
			echo $customer_num_k;
			echo '<br>';
			$txt=fgets($k_fp);
			$txt=fgets($k_fp);
			
			$total_item_num=( int ) fread($k_fp, 20) ;
			echo $total_item_num;
			echo '<br>';
			fclose($k_fp);
			//End ooooooooooooooooooooooooooooooooooo
*/					
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
			
			
			fclose($k_fp);
			
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
			

?>
</body>
</html>
