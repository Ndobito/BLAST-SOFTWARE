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
    public function buscarProveedor()
    {
    }

    public function cerrarSesion()
    {
        session_destroy();
        redirect("index.php");
        exit();
    }
<<<<<<< HEAD

=======
>>>>>>> 2d2d71df0604c37f5e53cbab498709ba2108c014
}

$profileAdminController = new Profile();

// $profileAdminController->Inicio();