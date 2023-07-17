<?php

include_once 'lib/database/database.php'; 
class newAccountPet{

    private $consulta;

    public $id, $namepet, $agepet, $genpet, $esppet, $idcli; 
    
    public function __construct(){
        try{
            $this->consulta = databaseConexion::conexion(); 
        }catch(Exception $e){
            echo "Error de Conexion ". $e -> getMessage(); 
        }
    }

    public function Registrar(newAccountPet $data){
        try{
            $pet= "INSERT INTO mascota(nommas, edadmas, genmas, espmas, idcli) VALUES (?, ?, ?, ?, ?)";
            $this -> consulta -> prepare($pet)-> execute(array(
                $data -> namepet, 
                $data -> agepet, 
                $data -> genpet, 
                $data -> esppet, 
                $data -> idcli, 
            )); 
        } catch (Exception $error){
            echo "No se puede registrar el Usuario: ". $error->getMessage();
        }
    }

}

?>