<?php

require_once 'model/inventory.php';

class InventoryController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function index()
    {
        $products = $this->model->getAllProducts();
        require 'index.php';
    }
    public function listado()
    {
        $style = "<link rel='stylesheet' href='assets/css/style-inventory.css'>";
        require_once "view/head.php";
        require_once 'view/inventory/inventory.php';
    }
    public function editar()
    {
        $style = "<link rel='stylesheet' href='assets/css/style-editar.css'>";
        require_once "view/head.php";
        require_once 'view/inventory/editar.php';
    }
    public function agregar()
    {
        $style = "<link rel='stylesheet' href='assets/css/agregar.css'>";
        require_once "view/head.php";
        require_once 'view/inventory/agregar.php';
    }

    public function guardar() {
        // (new ProductModel())->guardar();
        header("Location: ?b=inventory&s=listado");

    }
}

$controller = new InventoryController();
$controller->index();
?>
$controller->index();
