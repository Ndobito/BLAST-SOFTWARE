<?php 
include_once "model/editarInfo.php";
class editarinfoController{
    private $object;

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
    public function guardarproveedor(){

        $idProv = $_POST['ctIdProv'];
        $nombreProv = $_POST['ctNomProv'];
        $direccionProv = $_POST['ctDirProv'];
        $emailProv = $_POST['ctEmaProv'];
        $telefonoProv = $_POST['ctTelProv'];
        
        $this->object->guardarproveedor($idProv, $nombreProv, $direccionProv, $emailProv, $telefonoProv);
        
        setNotify("success", "Se ha guardado correctamente " . $nombreProv . " correctamente");
        redirect("?b=profile&s=Inicio&p=admin");
    }


    // colaborador

    public function EditarInfoEmp(){

        if (isset($_GET["idcola"])) {
            $idColaborador = $_GET["idcola"];
            $colaborador = $this->object->empleado($idColaborador);
            require_once "view/profile/admin/empleados/editar.php";
        } else {
            echo "Error: ID de colaborador no encontrado.";
            exit();
        }
    }
    public function GuardarInfoEmp(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {



            $idCol = $_POST["idcol"];
            $nombreCol = $_POST["nomcol"];
            $direccionCol = $_POST["dircol"];
            $emailCol = $_POST["emacol"];
            $telefonoCol = $_POST["telcol"];
            $rolCol = $_REQUEST["rolcol"];

            $this->object->actualizaempleado($idCol, $nombreCol, $direccionCol, $emailCol, $telefonoCol, $rolCol);
            
            setNotify("success", "Se ha actualizado los datos del empleado correctamente");
            redirect("?b=profile&s=Inicio&p=admin");
        }
    }


    ///// clientes

}

?>