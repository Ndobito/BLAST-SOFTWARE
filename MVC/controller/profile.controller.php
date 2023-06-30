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
                var_dump($rol);
                echo "Rol indefinido"; 
                break;
        }   

        require_once "view/profile/".$rol."/profile.php";
        require_once "view/footerprofile.php";

    }

    public function update() {

    }

    //-----Metodo para actualizar Datos-----//
    
    public function actualizarUsuario(){
        if(isset($_REQUEST['btnUpdateProfile'])){
            if($_POST['ctNameUser'] == "" || $_POST['ctSurNameUser'] == "" || $_POST['ctAdrUser'] ==  "" || $_POST['ctEmailUser'] == "" || $_POST['ctNumCelUser'] == ""){
                redirect("?b=profile&s=Inicio&p=admin&v=true")->error("Se deben llenar todos los campos")->send();
            } else {
                $u = new Profile(); 
                $u -> id = $_POST['ctIdUser']; 
                $u -> nombre = $_POST['ctNameUser']; 
                $u -> apellido = $_POST['ctSurNameUser']; 
                $u -> direccion = $_POST['ctAdrUser']; 
                $u -> email = $_POST['ctEmailUser']; 
                $u -> numcel = $_POST['ctNumCelUser']; 
                $u -> numcel2 = $_POST['ctNumCel2']; 
                if ($this -> object -> update($u)) {
                    if ($_POST['ctNameUser'] != $_SESSION["usuario"]) {
                        session_destroy();
                        redirect("index.php")->success("Se ha actualizado el nombre de usuario, vuelva a iniciar sesión")->send();
                    } else {
                        redirect("?b=profile&s=Inicio&p=admin&v=false")->success("Se ha actualizado la información del usuario")->send();
                    }
                } else {
                    redirect("?b=profile&s=Inicio&p=admin&v=false")->error("No se pudo actualizar el usuario")->send();
                }

            }
        }
        

    }

    public function cerrarSesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
    //-----Metodo para ver los probedores-----//
    
}
