<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include 'config/database.php';
// include_once 'class/product.php';

// $query = "SELECT * FROM products";
$query = "SELECT products.product_id, category.category_name, category.category_value,
 products.product_name, products.product_sku, products.product_price FROM category INNER JOIN products ON category.product_id = products.product_id";

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
        "product_id" => $product_id,
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
