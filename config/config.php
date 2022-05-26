<?php
// Configuration for errors
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Set url for local development
define('URL', 'http://127.0.0.1/e-commerce-php/');


// Database Configuration
define('DB_TYPE', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'product_db');
define('DB_USER', 'joel');
define('DB_PASS', '1234567');