<?php


class ProfileColaboradorController 
{
    public function Inicio()
    {
        $style = "<link rel='stylesheet' href='assets/css/style-profile-veterinario.css'>";
        require_once "view/head.php";
        $nombreUsuario = $_SESSION['usuario'];
        $data = compact('nombreUsuario');
        require_once "view/profile/profilecolaborador.php";
        require_once "view/footerprofile.php";
    }

    public function cerrarSesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
