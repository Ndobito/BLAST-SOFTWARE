<?php
include_once "model/profile.php";

class ProfileController 
{
    public function Inicio()
    {
        $style = "<link rel='stylesheet' href='assets/css/style-profile.css'>";
        require_once "view/head.php";
        $nombreUsuario = $_SESSION['usuario'];
        $data = compact('nombreUsuario');
        require_once "view/profile/profile.php";
    }

    public function cerrarSesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}

