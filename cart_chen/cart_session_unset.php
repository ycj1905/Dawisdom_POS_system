<?php
    session_start();
    session_unset();
    session_destroy();
echo "sesssion variables were destroied.";	
?>