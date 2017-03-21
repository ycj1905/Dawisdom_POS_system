<?php
$file = $_POST['ftp_download_filename'];
// connect and login to FTP server
//$ftp_server = "ftp://ftp.dawisdom.com"; //wrong
$ftp_server = "ftp.dawisdom.com";

//$ftp_server = "69.195.124.74";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, "hwafuchen@dawisdom.com", "Bluehost@5773988");
ftp_pasv($ftp_conn, true);

//$file = "s1.jpg";

//$local_file = 'local.zip';
//$server_file = 'server.zip';
// set up basic connection
//$conn_id = ftp_connect($ftp_server);

// login with username and password
//$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
// try to download $server_file and save to $local_file
//if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY))

$local_file = "./local_file/$file";
$server_file = "./cart_chen/server_file/$file";
//if (ftp_get($ftp_conn, $local_file, $server_file, FTP_IMAGE))
if (ftp_get($ftp_conn, $local_file, $server_file,FTP_IMAGE))
  {
  echo "Successfully download $file.";
  }
else
  {
  echo "Error download $file.";
  }

header("Refresh:2; url= cart_ftp_input.php ");
// close connection
ftp_close($ftp_conn);
?>
