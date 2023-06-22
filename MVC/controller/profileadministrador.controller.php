<?php

include_once 'model/administrador.php';
include_once 'controller/updateprofile.controller.php';

class ProfileAdministradorController
{
    public function Inicio()
    {
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $updateProfileController = new UpdateProfileController();
            $updateProfileController->guardarAdministrador();
        }

        $style = "<link rel='stylesheet' href='assets/css/style-profile-administrator.css'>";
        require_once "view/head.php";
        $nombreUsuario = $_SESSION['usuario'];

        $model = new AdministradorModel();
        $administrador = $model->obtenerAdministradorPorNombre($nombreUsuario);

        if ($administrador !== null) {
            $data = compact('administrador');
            require_once "view/profile/profileadministrador.php";
        } else {
           
        }

        require_once "view/footerprofile.php";
    }

    public function cerrarSesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}

$profileAdminController = new ProfileAdministradorController();

$profileAdminController->Inicio();
