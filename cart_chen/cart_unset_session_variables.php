

<?php
// unset all the $_SSESSIOn[]variables and cookie

    session_start();
    session_unset();
    session_destroy();
echo "sesssion variables were destroied.";	

header("Refresh:0; url= cart_index.php ");
?>

