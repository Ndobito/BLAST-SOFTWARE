<?php

include_once 'lib/database/database.php'; 

class Model{
    private $conexion; 
    public function __construct(){

        $this-> conexion = databaseConexion::conexion(); 

    }

}

?>