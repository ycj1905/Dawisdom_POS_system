
<?php 
	$i=3;
	$file_origin="./text_file/".$i.".txt";
	
	while((file_exists($file_origin))) 
	{
   		
		unlink("$file_origin");
		echo "Deleted files: ".$file_origin . "<br>";
		
		$i++;
		$file_origin="./text_file/".$i.".txt";
		
	}//wile
	$i=1;
	$file_origin="./text_file/".$i.".txt";
	
	while((file_exists($file_origin))) 
	{
   		
		//unlink("$file_origin");
		echo $file_origin . "<br>";
		
		$i++;
		$file_origin="./text_file/".$i.".txt";
		
	}//wile
	
	
?>


