<?php


class ProfileAdministradorController 
{
    public function Inicio()
    {
        $style = "<link rel='stylesheet' href='assets/css/style-profile-administrator.css'>";
        require_once "view/head.php";
        require_once "view/profile/profileadministrador.php";
    }

    public function cerrarSesion()
    {
        session_destroy();
        header('Location: index.php');
        exit();
    }
    
}
if (isset($_SESSION['ultimaActividad'])) {
    $tiempoInactividad = 1 * 60; // 1 minuto
    $tiempoActual = time();
    $tiempoTranscurrido = $tiempoActual - $_SESSION['ultimaActividad'];

    if ($tiempoTranscurrido > $tiempoInactividad) {
        session_unset();
        session_destroy();
        header('Location: ?b=login');
        exit();
    }

    $_SESSION['ultimaActividad'] = $tiempoActual; 
}
