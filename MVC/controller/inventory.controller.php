<?php

include_once 'lib/database/database.php';
require_once 'model/inventory.php';

class InventoryController
{
    private $model;
    private $prod;
    private $conexion;
    public function __construct()
    {
        $this->conexion = databaseConexion::conexion();
        $this->model = new ProductModel();
    }

    public function Inicio()
    {
        header("Location: ?b=inventory&s=listado");
    }
    public function listado()
    {
        $param = [];
        $resto = "";
        if (isset($_REQUEST["search"])) {
            $resto = "&& (prd.nomprod LIKE ? || prd.desprod LIKE ? || prd.catprod LIKE ? || prv.nomprov LIKE ?)";
            $param[] = "%" . $_REQUEST["search"] . "%";
            $param[] = "%" . $_REQUEST["search"] . "%";
            $param[] = "%" . $_REQUEST["search"] . "%";
            $param[] = "%" . $_REQUEST["search"] . "%";
        }
        $stmt = $this->conexion->prepare("SELECT prd.*, prv.idprov, prv.nomprov FROM producto as prd, proveedor as prv WHERE prv.idprov = prd.idprov" . $resto);
        $stmt->execute($param);
        $items = [];
        $result = $stmt->get_result();
        while ($item = $result->fetch_assoc()) {
            $items[] = $item;
        }
        
        $style = "<link rel='stylesheet' href='assets/css/style-inventory.css'>";
        require_once "view/head.php";
        require_once 'view/inventory/inventory.php';
    }
    public function editar()
    {
        $stmt = $this->conexion->prepare("SELECT prd.*, prv.idprov, prv.nomprov FROM producto as prd, proveedor as prv WHERE prv.idprov = prd.idprov && idprod = ?");
        $stmt->execute([$_REQUEST["idprod"]]);
        $result = $stmt->get_result();
        $producto = $result->fetch_assoc();
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
        $prod = new ProductModel();
      
        $prod->idprov = $_REQUEST['idprov'];
        $prod->nomprod = $_REQUEST['nombre'];
        $prod->desprod = $_REQUEST['descripcion'];
        $prod->imgprod = $_REQUEST['imagen'];
        $prod->precprod = $_REQUEST['precio'];
        $prod->precvenprod = $_REQUEST['venta'];
        $prod->stockprod = $_REQUEST['cantidad'];
        $prod->catprod = $_REQUEST['categoria'];
        $this->model->guardar($prod);
        header("Location: ?b=inventory&s=listado");
    }

    public function eliminar() {
        $prod = new ProductModel();
        $prod->idprod = $_REQUEST["idprod"];
        $this->model->eliminar($prod);
        header("Location: ?b=inventory&s=listado");
    }

    public function edit(){
        $prod = new ProductModel();
        $prod->idprod = $_REQUEST['idprod'];
        $prod->nomprod = $_REQUEST['nombre'];
        $prod->desprod = $_REQUEST['descripcion'];
        $prod->imgprod = $_REQUEST['imagen'];
        $prod->precprod = $_REQUEST['precio'];
        $prod->precvenprod = $_REQUEST['venta'];
        $prod->stockprod = $_REQUEST['cantidad'];
        $prod->catprod = $_REQUEST['categoria'];
        $prod->idprov = $_REQUEST['proveedor'];
    $this->model->actualizar($prod);
    header('Location: index.php?b=inventory&s=listado');
    }

}
// ?>
