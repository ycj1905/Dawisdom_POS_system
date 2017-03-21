<?php
$file = $_POST['ftp_download_filename'];
// connect and login to FTP server
//$ftp_server = "ftp.dawisdom.com";
$ftp_server = "69.195.124.74";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, "hwafuchen@dawisdom.com", "Bluehost@5773988");
ftp_pasv($ftp_conn, true);

//$file = "s1.jpg";

// upload file
if (ftp_get($ftp_conn, $file, "/cart_chen/images/$file", FTP_IMAGE))
  {
  echo "Successfully download $file.";
  }
else
  {
  echo "Error download $file.";
  }

header("Refresh:5; url= cart_ftp_input.php ");
// close connection
ftp_close($ftp_conn);
?>
