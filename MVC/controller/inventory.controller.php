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
        // -----Metodos para obtener los datos----- //
        $productos = $this->model->getAllProducts();
        $categorias = $this->model->getAll("categoria"); 
        $proveedores = $this->model->getAll("proveedor"); 
        // -----Buscador----- //
        $param = [];
        $resto = "";
        $condition = "";
        if (isset($_REQUEST["search"])) {
            $condition = " WHERE prd.nomprod LIKE ?";
            $param[] = "%" . $_REQUEST["search"] . "%";
        }
        
        $stmt = $this->conexion->prepare("SELECT prd.*, prv.idprov, prv.nomprov, cat.namecat FROM producto as prd
            INNER JOIN proveedor as prv ON prv.idprov = prd.idprov
            INNER JOIN categoria as cat ON cat.idcat = prd.catprod
            $condition");
        $stmt->execute($param);
        
        $items = [];
        $result = $stmt->get_result();
        while ($item = $result->fetch_assoc()) {
            $items[] = $item;
        }
        // -----Vistas-----//
        $style = "<link rel='stylesheet' href='assets/css/style-inventory.css'>";
        require_once "view/head.php";
        require_once 'view/inventory/inventory.php';

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
        $stmt = $this->conexion->prepare("SELECT prd.*, prv.idprov, prv.nomprov, cat.namecat FROM producto as prd, proveedor as prv, categoria as cat WHERE prv.idprov = prd.idprov" . $resto);
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

    // -----Metodo para vista de nueva categoria----- // 
    public function newCategory(){
        $style = "<link rel='stylesheet' type='text/css' href='assets/css/style-editar.css'>"; 
        require_once "view/head.php"; 
        require_once "view/inventory/new-category.php"; 
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

    // -----Metodo para la vista de agregar nuevo producto----- //
    public function agregar()
    {      
        $categorias = $this->model->getAll("categoria"); 
        $proveedores = $this->model->getAll("proveedor"); 
        $style = "<link rel='stylesheet' type='text/css' href='assets/css/agregar.css'>";
        require_once "view/head.php";
        require_once 'view/inventory/agregar.php';
    }

    // -----Metodo para guardar un nuevo producto----- // 
    public function guardar()
    {
        $prod = new ProductModel();
        $prod->nomprod = $_POST['name'];
        $prod->desprod = $_POST['des'];
        $prod->precprod = $_POST['prec'];
        $prod->precvenprod = $_POST['precVen'];
        $prod->stockprod = $_POST['cant'];
        $prod->catprod = $_POST['selCat'];
        $prod->idprov = $_POST['selProv'];
        
        if($this->model->saveProducto($prod)){
            redirect("?b=inventory&s=Inicio")->success("Producto agregado con exito!!!")->send();
        }else{
            redirect("?b=inventory&s=Inicio")->error("No se agrego el producto")->send();
        }
    }

    public function eliminar()
    {
        $prod = $_REQUEST["idprod"];
        if($this->model->deleteProduct($prod)){
            redirect("?b=inventory&s=Inicio")->success("Producto eliminado con exito")->send();
        }else{
            redirect("?b=inventory&s=Inicio")->error("Error al eliminar el producto")->send();
        }
        
    }

    public function edit()
    {
        $prod = new ProductModel();
        $prod->idprod = $_REQUEST['idprod'];
        $prod->nomprod = $_REQUEST['nombre'];
        $prod->desprod = $_REQUEST['descripcion'];
        $prod->precprod = $_REQUEST['precio'];
        $prod->precvenprod = $_REQUEST['venta'];
        $prod->stockprod = $_REQUEST['cantidad'];
        $prod->catprod = $_REQUEST['categoria'];
        $prod->idprov = $_REQUEST['proveedor'];
        $this->model->actualizar($prod);
        redirect("?b=inventory&s=listado")->success("Se ha actualizado el producto <b>" . $_REQUEST["nombre"] . "</b> correctamente")->send();
    }

    
    // -----Metodo para guardar un nueva categoria----- // 
    public function guardarCategoria(){
        if(!empty($_POST['nameCat']) || !empty($_POST['desCat'])){
            if($this->model->verifyNumberString($_POST['nameCat'])){
                redirect("?b=inventory&s=newCategory")->error("El nombre de la categoria no puede llevar numeros")->send();
            }else{
                $cat = new ProductModel(); 
                $cat->namecat = $_POST['nameCat'];
                $cat->descat = $_POST['desCat']; 
                if($this->model->saveCategory($cat)){
                    redirect("?b=inventory&s=Inicio")->success("Categoria agregada con exito!!!")->send();
                }else{
                    redirect("?b=inventory&s=Inicio")->error("No se agrego la categoria")->send();
                }
            }
        }else{
            var_dump(empty($_POST['nameCat'])); 
        }
    }
}

?>