<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<?php 
date_default_timezone_set('asia/taipei');
$date=date('l jS \of F Y h:i:s A');
echo $date;echo "<br>";

$day = date("Y-m-d");
$day_add_1day= date( "Y-m-d", strtotime( "$day +1 day" ) ); 
$day_add_2month=date( "Y-m-d", strtotime( "$day +2 month" ) ); 

//$day=date('l jS \of F Y  A');
echo 'day= '.$day;echo "<br>";
echo 'day_add_1day= '.$day_add_1day;echo "<br>";
echo 'day_add_2month= '.$day_add_2month;echo "<br>";

//$file_name = fopen("./text_file/customer_no.txt", "w"); 
  	$file_name = fopen("./text_file/test.txt", "a");
  	
	$data = 'aaaa' . PHP_EOL . 'bbbb'. PHP_EOL ;
	
	fwrite($file_name, $data);
  	fclose ($file_name);

	
//read ./text_file/customer_no.txt
	$file_name = fopen("./text_file/test.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file

	$line = array();
	$i=0;
	while(!feof($file_name)) 
	{
   		$line[$i]=fgets($file_name);
		echo $line[$i] . "<br>";
		$i++;
		
		//echo fgets($file_name) . "<br>";
	}//wile
	
	fclose($file_name);
	
//delete a file using unlink	
$fh = fopen('./text_file/test_1.txt', 'a');
fwrite($fh, 'Hello world!');
fclose($fh);

unlink('./text_file/test_1.txt');

?>

 
</html>

