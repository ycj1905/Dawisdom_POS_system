<?php
//
//sudo chown www-data -R cam_file  ** to change cam_file's group to www-data
//sudo chgrp www-data -R cam_file  ** to change cam_file's group to www-data
//grep pi /etc/group  **to see the members of pi
//sudo usermod -g pi www-data  **-g (primary group assigned to the users) 
//the above is to change www-datas group to pi 
//note: pi here is a group name
//usermod -G secondarygroupname username
//sudo usermod -G pi www-data

//using pi print 「已付帳明細表」 「廚房明細表」			
$result = shell_exec("sudo ./vc_0");
echo "<pre>$result</pre>"; 
 
//header("Refresh:2; url= cart_index.php "); 
?>
