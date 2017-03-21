<?php
if (!isset($_SESSION)) session_start();
	
		//session_start(); 
	require_once("cart_config_cart.php");

//add product to session or create new one
/*
The foreach construct provides an easy way to iterate over arrays. foreach works only on arrays and objects, and will issue an error when you try to use it on a variable with a different data type or an uninitialized variable. There are two syntaxes:

foreach (array_expression as $value)
    statement
foreach (array_expression as $key => $value)
    statement
The first form loops over the array given by array_expression. On each iteration, the value of the current element is assigned to $value and the internal array pointer is advanced by one (so on the next iteration, you'll be looking at the next element).

The second form will additionally assign the current element's key to the $key variable on each iteration.
$a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);
 
foreach ($a as $k => $i)//$k is the index of $a, i.e.,$k= "one","two"....
 {
    echo "$k: $i\n";
}
*/

if(isset($_POST["type"]) && $_POST["type"]=='add' && $_POST["product_qty"]>0)
{
	foreach($_POST as $key => $value){ //add all 4 post vars to new_product array
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);
    }
	//keep $new_product['product_code'] and $new_product['product_qty']
	// and remove unecessary vars
	
	unset($new_product['type']);
	unset($new_product['return_url']);
	
	
 	//we need to get product name and price from database.
    $statement = $mysqli->prepare("SELECT product_name, price FROM products WHERE product_code=? LIMIT 1");
    $statement->bind_param('s', $new_product['product_code']);
    $statement->execute();
    $statement->bind_result($product_name, $price);
	
	while($statement->fetch()){ //while
		
		//fetch product name, price from db and add to new_product array
        $new_product["product_name"] = $product_name; 
        $new_product["product_price"] = $price;
        
        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['product_code']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_product['product_code']]); //unset old array item
            }           
        } //while
		
        $_SESSION["cart_products"][$new_product['product_code']] = $new_product;
		// $_SESSION["cart_products"][1] = $new_product;
		
    } 
}


//update product_qty
if(isset($_POST["product_qty"]))
{
	//update item quantity in product session
/*
The foreach construct provides an easy way to iterate over arrays. foreach works only on arrays and objects, and will issue an error when you try to use it on a variable with a different data type or an uninitialized variable. There are two syntaxes:

foreach (array_expression as $value)
    statement
foreach (array_expression as $key => $value)
    statement
The first form loops over the array given by array_expression. On each iteration, the value of the current element is assigned to $value and the internal array pointer is advanced by one (so on the next iteration, you'll be looking at the next element).

The second form will additionally assign the current element's key to the $key variable on each iteration.
 $a = array(
    "one" => 1,
    "two" => 2,
    "three" => 3,
    "seventeen" => 17
);
 
foreach ($a as $k => $i)//$k is the index of $a, i.e.,$k= "one","two"....
 {
    echo "$k: $i\n";
}
*/	
	if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
		foreach($_POST["product_qty"] as $key => $value){
			if(is_numeric($value)){
				$_SESSION["cart_products"][$key]["product_qty"] = $value;
//Therefore $_SESSION["cart_products"][$new_product['product_code']]["product_qty"] = $value;				
			}
		}
	}

}
		
		
		 
		
//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
//header('Location:'.$return_url);
//header("Refresh:0; url= cart_contact_login_input.php ");
require_once('cart_contact_login_input.php');
?>
