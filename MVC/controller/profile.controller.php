<?php
include_once "model/profile.php";

class ProfileController 
{
    public function Inicio()
    {
        require_once "view/head.php";
        $style = "<link rel='stylesheet' href='assets/css/style-profile.css'>";
        require_once "view/profile/profile.php";
    }

    public function cerrarSesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
