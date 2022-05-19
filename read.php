<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include 'config/database.php';
// include_once 'class/product.php';

// $query = "SELECT * FROM products";
$query = "SELECT category.category_name, category.category_value, products.product_name, products.product_sku
, products.product_price FROM products INNER JOIN category ON category.category_id=products.category_id";


/* Execute the query */
$result = $mysqli->query($query);

/* Check for errors */
if (!$result) {
    echo 'Query error: ' . $mysqli->error;
    die();
}

$productsArr = array();

/* Iterate through the result set */
while ($row = mysqli_fetch_assoc($result)) {

    extract($row);
    $e = array(
        "product_sku" => $product_sku,
        "product_name" => $product_name,        
        "product_price" => $product_price,
        "category_value" => $category_value,
        "category_name" => $category_name,

    );
    array_push($productsArr, $e);

    }
// JSON Stringfy
echo json_encode($productsArr);