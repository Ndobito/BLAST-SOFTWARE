<?php

include_once "model/Profile.php";

class ProfileController
{

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
                echo "Rol indefinido"; 
                break;
        }   

        require_once "view/profile/$rol/profile.php";
        require_once "view/footerprofile.php";

    }
   
    public function cerrarSesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
