<?php

/**
 * This is the base controller class
 */

class Controller
{
    /**
     * @var null database connection
     */
    public $db = null;

    /**
     * Open a database connection when a controller is created.
     */
    public function __construct()
    {
        $this->openDatabaseConnection();
    }

    /**
     * Open a database with credentials
     */
    private function openDatabaseConnection()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        
        // Generate a database connection using PDO connection
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options); 
    }
    
    public function loadModel($model_name)
    {
        require 'models/' . strtolower($model_name) . '.php';

        return new $model_name($this->db);
    }
}
