<?php

class ProductsModel
{

    /**
     * A PDO database connection, passed to the model
     * @param object $db
     */

    public function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all products from database
     */
    public function getAllProducts()
    {
        // $sql = "SELECT id, artist FROM products";
        $sql = "SELECT products.product_id, category.category_name, category.category_value,
                products.product_name, products.product_sku, products.product_price
                FROM category INNER JOIN products ON category.product_id = products.product_id";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * Add a product to database
     */
    public function addProduct($name, $sku, $price)
    {
        // clean input from js code
        $name = strip_tags($name);
        $sku = strip_tags($sku);
        $price = strip_tags($price);

        $sql = "INSERT INTO product(name, sku, price) VALUES(:)";
        $query = $this->db->prepare($sql);
        $query->execute(array(':name' => $name, ':sku' => $sku, ':price' => $price));
    }

    /**
     * Delete a product in the database
     * @param int $product_id of product
     */
    public function deleteProduct($product_id)
    {
        $sql = "DELETE FROM product WHERE id = :product_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':product_id' => $product_id));
    }
}
