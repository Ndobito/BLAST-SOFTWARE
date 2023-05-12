<?php

include_once 'model/database.php'; 
class newAccount{

    private $consulta;
    
    public $nombre, $apellido, $email, $confemail, $dir, $zona, $phone, $phonealt;
    
    public function __construct(){
        try{}catch(Exception $e){
            echo "Error de Conexion ". $e -> getMessage(); 
        }
        $this -> consulta = databaseConexion::conexion();
    }

    public function mostrar(){

    }


}

?>