<?php

include_once 'lib/database/database.php'; 
class newAccount{

    private $consulta;
    
    public $id, $name, $numid, $uname, $email, $user, $pass, $dir, $zone, $phone, $phonealt;
    
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
                return true;
            } else{
                return false; 
            } 
        }catch(Exception $e){
            echo "Error: ".$e->getMessage(); 
        }
    }

    // -----Metodo para verificar si un string contiene numeros----- //
    public function verifyNumberString($string){
        return preg_match('/\d/', $string) === 1 ? true : false; 
    }

    // -----Metodo para verificar que un string sea un correo electronico----- //
    public function verifyEmailString($string){
        return filter_var($string, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    // -----Metodo para verificar que entre los numero haya letras----- //
    public function verifyLeterString($number){
        return preg_match('/[a-zA-Z]/', $number) === 1 ? true : false; 
    }

    // -----Metodo para verificar contraseña----- //
    public function verifyPasswordString($password){
        $longmin = 8; 
        $mayus = true; 
        $minus = true; 
        $number = true; 

        // -----Verificar longitud minima----- //
        $longpass = (strlen($password) < $longmin) ? false : true;
        // -----Verificar mayuscula----- //
        $mayuspass = ($mayus && preg_match('/[A-Z]/', $password)) ? true : false;  
        // -----Verificar minuscula----- //
        $minuspass = ($minus && preg_match('/[a-z]/', $password)) ? true : false; 
        // Verificar numeros----- //
        $numberpass = ($number && preg_match('/[0-9]/', $password)) ? true : false;

        return ($longpass === true && $mayuspass === true && $minuspass === true && $numberpass === true) ? true : false; 
    }

}

?>