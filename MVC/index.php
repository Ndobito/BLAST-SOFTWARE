<?php
include_once 'model/database.php';
session_start(); // Iniciar la sesión

// Verificar si el usuario está logueado
if (isset($_SESSION['usuario'])) {
    // Mostrar el nombre de usuario en lugar de "Iniciar Sesión"
    $nombreUsuario = $_SESSION['usuario'];
}

$controller = "index";

if(!isset($_REQUEST['b'])){
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller).'controller';
    $controller = new $controller; 
    $controller -> Inicio();  
} else{
    $controller = strtolower($_REQUEST['b']);
    $action = isset($_REQUEST['s']) ? $_REQUEST['s'] : 'Inicio'; 
    require_once "controller/$controller.controller.php";
    $controller = ucwords($_REQUEST['b']).'controller';
    $controller = new $controller(); 
    call_user_func(array($controller, $action));
}
require_once "view/notify.php";

?>