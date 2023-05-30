<?php

 class Login{   
    private $consulta;

    public  $user, $pass;
    
    public function __construct(){
        try{
            $this -> consulta = databaseConexion::conexion();
        }catch(PDOException $e){
            echo "Error de Conexion ". $e -> getMessage(); 
        }
    }
 }


?>