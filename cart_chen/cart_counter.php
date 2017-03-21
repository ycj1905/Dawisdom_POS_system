<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<?php 

  $handle = fopen("counter.txt", "r"); 
  if(!$handle)
  { 
  		echo "could not open the file" ; }
   else
   {
		$counter = ( int ) fread ($handle,20) ;
		fclose ($handle) ;
		//$counter++ ;
		echo"序號： ". $counter ; 
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

