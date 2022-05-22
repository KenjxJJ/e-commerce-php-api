<?php

/* Include MySQLi Connection */
include 'config/database.php';

/* Query #1: create the table structure */
$products_query = 

'CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8';

/* Execute the SQL query */
if (!$mysqli->query($products_query))
{
   /* if mysqli::query() returns FALSE it means an error occurred */
   echo 'Query error: ' . $mysqli->error;
   die();
}

echo 'Products table created successfully<br>';

/* Query #2 */
$products_pk = 'ALTER TABLE `products` ADD PRIMARY KEY (`id`)';

/* Execute the SQL query */
if(!$mysqli->query($products_pk)){
    echo 'Query error: '. $mysqli->error;
    die();
}

echo 'Primary key added successfully<br>';

/* Query #3 */
$products_ai = 'ALTER TABLE `products` MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT';

/* Execute the SQL query */
if (!$mysqli->query($products_ai))
{
   /* if mysqli::query() returns FALSE it means an error occurred */
   echo 'Query error: ' . $mysqli->error;
   die();
}

echo 'Auto-increment set successfully<br>';

