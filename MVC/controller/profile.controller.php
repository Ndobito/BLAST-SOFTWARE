<?php

include_once "model/Profile.php";


class ProfileController
{
    
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
    //-----Metodo para actualizar Datos-----//
    
    public function update(){

        $nombre = $_REQUEST['ctNameUser']; 
        $apellido = $_REQUEST['ctSurNameUser']; 
        $nombre = $_REQUEST['ctNameUser']; 
        $nombre = $_REQUEST['ctNameUser']; 
        $nombre = $_REQUEST['ctNameUser']; 
        $nombre = $_REQUEST['ctNameUser']; 
        $nombre = $_REQUEST['ctNameUser']; 

    }

    public function cerrarSesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
    //-----Metodo para ver los probedores-----//
    
}
