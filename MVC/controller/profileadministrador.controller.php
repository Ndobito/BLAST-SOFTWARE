<?php

include_once 'model/Profile.php';
include_once 'controller/updateprofile.controller.php';

class ProfileController
{
    public function Inicio()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $updateProfileController = new UpdateProfileController();
            $updateProfileController->guardarAdministrador();
        }

        $nombreUsuario = $_SESSION['usuario'];
        $model = new Profile();
        $administrador = $model->selectUser($nombreUsuario);
        require_once "view/footerprofile.php";
    }


    public function cerrarSesion()
    {
        session_destroy();
        redirect("index.php");
        exit();
    }
}

$profileAdminController = new Profile();

// $profileAdminController->Inicio();