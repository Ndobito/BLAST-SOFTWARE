<?php

include_once 'model/database.php'; 
class newAccount{

    private $consulta;
    
    public $id, $name, $uname, $email, $user, $pass, $dir, $zone, $phone, $phonealt;
    
    public function __construct(){
        try{
            $this -> consulta = databaseConexion::conexion(); 
        }catch(Exception $e){
            echo "Error de Conexion ". $e -> getMessage(); 
        }
    }

    public function Registrar(newAccount $data){
    try{
        $pet = "INSERT INTO cliente(nomcli, emacli, usercli, passcli, dircli, tzonecli, telcli, telaltcli) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $this -> consulta -> prepare($pet)-> execute(array(
            $data -> name, 
            $data -> email, 
            $data -> uname, 
            $data -> pass, 
            $data -> dir, 
            $data -> zone, 
            $data -> phone, 
            $data -> phonealt, 
        )); 
         
    } catch (Exception $error){
        echo "No se puede registrar el Usuario: ". $error->getMessage();
    }


    }


}

?>