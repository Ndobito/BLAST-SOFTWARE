<?php 
include_once "model/editarinfo.php";

class editarinfoController{
    private $object;
    protected $model;
    public function __construct()
    {
        $this->object = new info();
    }
    public function EditarInfoProv(){

        if (isset($_GET["idprod"])) {
            $idProveedor = $_GET["idprod"];
            $proveedor = $this->object->proveedor($idProveedor);
            require_once "view/profile/admin/proveedor/editar.php";
        } else {
            echo "Error: ID de proveedor no encontrado.";
            exit();
        }
    }
public function guardarproveedor(){

   
    $proveedor = new info();

    // $proveedor->idprov = $_REQUEST['idprov'];
    $proveedor->nomprov = $_REQUEST['ctNomProv'];
    $proveedor->dirprov = $_REQUEST['ctDirProv'];
    $proveedor->emaprov = $_REQUEST['ctEmaProv'];
    $proveedor->telprov = $_REQUEST['ctTelProv'];
    
    $this->model->Save($proveedor);
        setNotify("success", "Se ha guardado correctamente " . $_REQUEST['ctNomProv'] . " correctamente");
        redirect("?b=profile&s=Inicio&p=admin");
}
    public function GuardarInfoProv(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $idProv = $_POST["ctIdProv"];
            $nombreProv = $_POST["ctNomProv"];
            $direccionProv = $_POST["ctDirProv"];
            $emailProv = $_POST["ctEmaProv"];
            $telefonoProv = $_POST["ctTelProv"];

            $this->object->actproveedor($idProv, $nombreProv, $direccionProv, $emailProv, $telefonoProv);
            setNotify("success", "Se ha guardado el producto  correctamente");
            redirect("?b=profile&s=Inicio&p=admin   ");
        }

    }
    
    }

?>