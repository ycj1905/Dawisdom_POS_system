<?php
 

//using pi print 「已付帳明細表」 「廚房明細表」			
$result = shell_exec("sudo ./cap_50.sh");
echo "<pre>$result</pre>"; 
 
//header("Refresh:2; url= cart_index.php "); 
?>
