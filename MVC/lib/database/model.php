<?php

include_once 'database.php'; 

class Model{
    private $conexion; 
    public function __construct(){
        $this-> conexion = databaseConexion::conexion(); 
    }
}

?>