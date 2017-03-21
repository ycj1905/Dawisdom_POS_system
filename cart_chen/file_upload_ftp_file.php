<?php
// setup php_ftp for remote uploading image
$php_ftp = "ftp.dawisdom.com";
$php_ftp_conn = ftp_connect($php_ftp) or die("Could not connect to $php_ftp");
$login = ftp_login($php_ftp_conn, "hwafuchen@dawisdom.com", "Bluehost@5773988");

$local_file_name = "images/S1.jpg"; 
$remote_file_name = "/cart_chen/images/S1.jpg"; 

// upload file
if (ftp_put($php_ftp_conn, $remote_file_name, $local_file_name, FTP_IMAGE))
  {
  echo "Uploaded successfully local_file_name ***".$local_file_name."***to remote_file_name *** ".$remote_file_name;
  }
else
  {
  echo "Uploaded failurely local_file_name ***".$local_file_name."***to remote_file_name *** ".$remote_file_name;
  }
 

// close connection
ftp_close($php_ftp_conn);
?>
