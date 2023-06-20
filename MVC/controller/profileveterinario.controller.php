<?php


class ProfileVeterinarioController 
{
    public function Inicio()
    {
        $style = "<link rel='stylesheet' href='assets/css/style-profile-veterinario.css'>";
        require_once "view/head.php";
        require_once "view/profile/profileaveterinario.php";
    }

    public function cerrarSesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
