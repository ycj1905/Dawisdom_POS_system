<?php
$ftp_conn = ftp_connect("ftp.dawisdom.com") or die("Could not connect");
ftp_login($ftp_conn,"hwafuchen@dawisdom.com","Bluehost@5773988");

//echo ftp_put($conn,"target.txt","source.txt",FTP_ASCII);
$file = $_POST['ftp_upload_filename'];
$local_file = "./local_file/$file";
$server_file = "./cart_chen/server_file/$file";
//if (ftp_put($ftp_conn, $server_file, $local_file, FTP_IMAGE))
if (ftp_put($ftp_conn, $server_file, $local_file,FTP_IMAGE))
  {
  echo "Successfully download $file.";
  }
else
  {
  echo "Error download $file.";
  }

header("Refresh:2; url= cart_ftp_upload_input.php ");







ftp_close($ftp_conn);
?>