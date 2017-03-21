<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<?php 

  $file_name = fopen("./text_file/customer_no.txt", "r"); 
  if(!$file_name)
  { 
  		echo "could not open the file" ; }
   else
   {
		//$customer_no = ( int ) fread ($file_name,20) ;
		
		$customer_no = ( int ) fgets($file_name) ;
		echo"序號： ". $customer_no ;
		echo "<br>";
		$Stored_day = fgets($file_name) ;
		echo"儲存的日期： ". $Stored_day ;
		
		
		fclose ($file_name) ;
		
	}


?>

 
</html>

