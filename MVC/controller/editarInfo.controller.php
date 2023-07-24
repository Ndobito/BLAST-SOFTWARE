<?php 
include_once "model/editarInfo.php";

class editarinfo{
    private $object;
    public function __construct()
    {
        $this->object = new info();
    }
    public function EditarInfoProv(){
        if (isset($_GET["idprod"])) {
            $idProveedor = $_GET["idprod"];
            return $idProveedor;
        } else {
            echo "Error: ID de proveedor no encontrado.";
            exit();
        }
    }



public function guardarproveedor(){

    
    $prod = new ProductModel();

    $prod->idprov = $_REQUEST['idprov'];
    $prod->nomprod = $_REQUEST['ctNomProv'];
    $prod->dirprod = $_REQUEST['ctDirProd'];
    $prod->emaprod = $_REQUEST['ctEmaProv'];
    $prod->telprod = $_REQUEST['ctTelProv'];
    
    $this->model->guardar($prod);
        setNotify("success", "Se ha guardado correctamente " . $_REQUEST['ctNomProv'] . " correctamente");
        redirect("?b=profile&s=Inicio&p=admin");
}
}
?>