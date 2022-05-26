<?php
class Home extends Controller{
   
    // First method to execute
    /**
     * @void 
     * 
     * Load all products on initial load
     */
    public function index(){

        // Obtain the model
        $products_model = $this->loadModel('productsmodel');
        
        // Obtain all products at the database
        $products = $products_model->getAllProducts();

        echo json_encode($products);
    }

}