<?php

class databaseConexion {
    public static function conexion(){
        try{
            //Variables que contiene host, nombre de la base de datos usuario y contraseña
            $db = "mysqli:host=localhost;port=8080;dbname=veterinaria";
            $u = "root"; 
            $p = ""; 
            $con = new PDO($db,$u,$p);
            return $con;  
        }catch(PDOException $error){
            echo "Error en conectar la Base de Datos: ". $error -> getMessage(); 
        }
    }
}

?>