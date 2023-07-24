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
}

?>