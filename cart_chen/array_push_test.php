<?php
session_start();

$stack = array('a', 'b', 'c');
array_push($stack, array('d', 'e', 'f'));
print_r($stack);

echo "<br>";
echo "<br>";

$a[1] = array('kk');
$a[1][1] = array();
array_push($a[1][1], array('mm', 'nn', 'oo'));
echo $a[1][1][0][0]; //mm
echo "<br>";
print_r($a);

echo "<br>";
echo "<br>";

$a[1] = array('kk');
array_push($a[1], array('mm', 'nn', 'oo'));
echo $a[1][1][0]; //mm
echo "<br>";
print_r($a);

echo "<br>";
echo "<br>";

$a = array('kk');
$b = array('mm', 'nn', 'oo');
$a[1] = $b;
echo $a[1][0]; //mm
echo "<br>";
print_r($a);


$a[3][3] = 888;
$a['qq']['zz'] = 888;
$_SESSION['ee']['ff']['gg'] = 55;

?>