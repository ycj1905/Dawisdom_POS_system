<?php
 
// for Linux
//$result = shell_exec('./prin.py');
//$file=$customer_no.'.txt';
//$result = shell_exec("sudo ./print.py ./local_file/$file");

//using pi print 「已付帳明細表」 「廚房明細表」			
$result = shell_exec("sudo ./print.py ./local_file/k.txt");
echo "<pre>$result</pre>"; 
 
header("Refresh:2; url= cart_index.php "); 
?>
