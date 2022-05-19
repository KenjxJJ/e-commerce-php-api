<?php

/* Host name  */
$host = 'localhost';

/* MySQL account username */
$user ='joel';

/* MySQL account password */
$passwd = '1234567';

/* The schema */
$schema = 'product_db';

/* connection with MySQL  */
$mysqli = new mysqli($host, $user, $passwd, $schema);

/* Check if the connection succeeded */
if(!is_null($mysqli->connect_error)){
    echo 'Connection failed<br>';
    echo 'Error number: '. $mysqli->connect_errno . '<br>';
    echo 'Error message: '. $mysqli->connect_error . '<br>';
    die();
}

