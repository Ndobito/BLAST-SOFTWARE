<?php


class ProfileAdministradorController 
{
    public function Inicio()
    {
        require_once "view/head.php";
        $style = "<link rel='stylesheet' href='assets/css/style-profile.css'>";
        require_once "view/profile/profileadministrador.php";
    }

    public function cerrarSesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
