<?php

include_once 'lib/database/database.php'; 
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
            $user= "INSERT INTO cliente(nomcli, emacli, usercli, passcli, dircli, tzonecli, telcli, telaltcli) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $this -> consulta -> prepare($user)-> execute(array(
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

    public function selectUser($nick){
        try{
            $sql = "SELECT idcli FROM cliente WHERE usercli='".$nick."'"; 
            $result = $this->consulta->query($sql);
            if($result->num_rows > 0 ){
                $fila = $result->fetch_assoc(); 
                $id = $fila['idcli'];
                return $id;
            } else{
                return null; 
            } 
        }catch(Exception $e){
            echo "Error: ".$e->getMessage(); 
        }
    }

    public function userExist($nick){
        try{
            $sql = "SELECT usercli FROM cliente WHERE usercli='".$nick."'"; 
            $result = $this->consulta->query($sql);
            if($result->num_rows > 0 ){
                $fila = $result->fetch_assoc(); 
                $user = $fila['usercli'];
                return $user;
            } else{
                return null; 
            } 
        }catch(Exception $e){
            echo "Error: ".$e->getMessage(); 
        }
    }

}

?>