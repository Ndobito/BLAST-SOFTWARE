<?php

include_once "model/Profile.php";

class ProfileController
{   
    private $object; 
    public function __construct(){
        $this-> object = new Profile();  
    }
    //-----Metodo para redireccionar segun el rol de inicio de sesión-----//
    public function Inicio($rol)
    {   
        $style = "<link rel='stylesheet' href='assets/css/style-$rol.css'>";
        require_once "view/head.php";
        $usuario = $_SESSION['usuario'];
        $model = new Profile();
        $proveedores = $this->object->getProveedores(); 
        switch ($rol) {
            case 'admin':
                $name = $_SESSION['usuario'];
                $user = $model->selectUser($usuario);
                $data = compact('user');
                break;
            case 'customer':
                $usuario = $model->selectUser($usuario);
                $data = compact('persona');
                break;
            case 'recepcionist':
                $administrador = $model->selectUser($usuario);
                $data = compact('persona');
                break;
            case 'collaborator':
                $administrador = $model->selectUser($usuario);
                $data = compact('persona');
                break;
            case 'vet':
                $administrador = $model->selectUser($usuario);
                $data = compact('persona');
                break;
            default:
                echo "Rol indefinido"; 
                break;
        }   

        require_once "view/profile/".$rol."/profile.php";
        require_once "view/footerprofile.php";

    }

    public function showEdit(){
        $style = "<link rel='stylesheet' href='assets/css/style-editar-proveedor.css'>";
        require_once "view/head.php";
        require_once "view/profile/admin/editar.php"; 
    }
    public function update() {

    }

    //-----Metodo para actualizar Datos-----//
    
    public function actualizarUsuario(){
        if(isset($_REQUEST['btnUpdateProfile'])){
            if($_POST['ctNameUser'] == "" || $_POST['ctSurNameUser'] == "" || $_POST['ctAdrUser'] ==  "" || $_POST['ctEmailUser'] == "" || $_POST['ctNumCelUser'] == ""){
                header("location: ?b=profile&s=Inicio&p=admin&v=true"); 
            } else {
                $u = new Profile(); 
                $u -> id = $_POST['ctIdUser']; 
                $u -> nombre = $_POST['ctNameUser']; 
                $u -> apellido = $_POST['ctSurNameUser']; 
                $u -> direccion = $_POST['ctAdrUser']; 
                $u -> email = $_POST['ctEmailUser']; 
                $u -> numcel = $_POST['ctNumCelUser']; 
                $u -> numcel2 = $_POST['ctNumCel2']; 


                $this -> object -> update($u); 
                header("location: ?b=profile&s=Inicio&p=admin&v=false"); 

            }
        }
        

    }
    
    //Metodo para cerrar Sesion
    public function cerrarSesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
