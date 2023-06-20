<?php

require_once 'model/inventory.php';

class InventoryController {
    private $model;

    public function __construct() {
        $this->model = new ProductModel();
    }

    public function index() {
        $products = $this->model->getAllProducts();
        require 'index.php';
    }
}

$controller = new InventoryController();
$controller->index();
?>