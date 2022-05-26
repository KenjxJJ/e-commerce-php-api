<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");


// load application config (error reporting etc.)
require './config/config.php';

require './libs/application.php';
require './libs/controller.php';

// Start the Application
$app = new Application();
