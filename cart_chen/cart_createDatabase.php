<?php
/*
Attempt MySQL server connection. Assuming you are running MySQL

*/
$link = mysqli_connect("localhost", "root", "1234");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt create database query execution
$sql = "CREATE DATABASE cart";
if(mysqli_query($link, $sql)){
    echo "Database login created successfully";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>