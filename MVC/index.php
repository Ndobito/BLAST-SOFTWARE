<?php

include_once 'model/database.php';

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
    $controller = ucwords($controller).'controller';
    $controller = new $controller; 
    call_user_func(array($controller, $accion)); 
}

<<<<<<< HEAD
=======


>>>>>>> 5a5748e8523b97311e50cb27bda4a077451e5636
?>