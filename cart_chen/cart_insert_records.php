<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "cart";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $conn->beginTransaction();
    // our SQL statememtns
    $conn->exec("INSERT INTO products (product_code, product_name, product_img_name, price) 
    VALUES ('PD1007', 'fruit', 'S7.jpg','25')");
    $conn->exec("INSERT INTO products (product_code, product_name, product_img_name, price)
	 VALUES ('PD1008', 'fruit', 'S8.jpg','30')");
	$conn->exec("INSERT INTO products (product_code, product_name, product_img_name, price)
	 VALUES ('PD1009', 'fruit', 'S9.jpg','35')");
    $conn->exec("INSERT INTO products (product_code, product_name, product_img_name, price) 
    VALUES ('PD1010', 'fruit', 'S10.jpg','25')");
    $conn->exec("INSERT INTO products (product_code, product_name, product_img_name, price)
	 VALUES ('PD1011', 'fruit', 'S11.jpg','20')");
	$conn->exec("INSERT INTO products (product_code, product_name, product_img_name, price)
	 VALUES ('PD1012', 'fruit', 'S12.jpg','80')");
	$conn->exec("INSERT INTO products (product_code, product_name, product_img_name, price) 
    VALUES ('PD1013', 'fruit', 'S13.jpg','40')");
    $conn->exec("INSERT INTO products (product_code, product_name, product_img_name, price)
	 VALUES ('PD1014', 'fruit', 'S14.jpg','65')");
	$conn->exec("INSERT INTO products (product_code, product_name, product_img_name, price)
	 VALUES ('PD1015', 'fruit', 'S15.jpg','50')");

    // commit the transaction
    $conn->commit();
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $conn->rollback();
    echo "Error: " . $e->getMessage();
    }

$conn = null;
?>