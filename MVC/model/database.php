<?php

class databaseConexion {
    public static function conexion(){
        try{
            $db = "mysqli:host=localhost;dbname=";
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