<?php

class databaseConexion {
    public static function conexion(){
            //Variables que contiene host, nombre de la base de datos usuario y contraseña
            $db = "mysqli:host=localhost;port=8080;dbname=veterinaria";
            $u = "root"; 
            $p = ""; 
            $con = new PDO($db,$u,$p);
            return $con;  
    }
}

?>