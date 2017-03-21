<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<?php 

  $File_name = fopen("./text_file/customer_no.txt", "r"); 
  if(!$File_name)
  { 
  		echo "could not open the file" ; }
   else
   {
		$customer_no = ( int ) fread ($File_name,20) ;
		fclose ($File_name) ;
		//$counter++ ;
		echo"序號： ". $customer_no ; 
		//$handle = fopen("counter.txt", "w" ) ; 
		//fwrite($handle,$counter) ;
		//fclose ($handle) ; 
	}
 if (empty($_POST["table"])) {
    $table_no=0;
  } else {
    $table_no =($_POST["table"]);
  }
  	
echo '<form method="post" action="">';
echo '桌號: <input type="text" name="table" value='.$table_no;echo ' >';
echo ' <input type="submit">';
echo ' </form>';


?>

 
</html>

