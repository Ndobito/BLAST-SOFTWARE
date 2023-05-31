<?php 

include_once 'model/database.php';

class bookAppointment{

    private $consulta; 
    public function __construct(){
        try{
            $this -> consulta = databaseConexion::conexion();
        }catch(Exception $e){
            echo "Error de Conexion ". $e -> getMessage(); 
        }
    }
}


?>