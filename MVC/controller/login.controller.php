<?php

include_once "model/login.php";
class loginController{
    private $object;

    public function __construct(){
        $this -> object = new Login(); 
    }

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/style-login.css'>"; 
        require_once "view/head.php"; 
        require_once "view/login/login.php"; 
    }
    public function revicion(){
        $user = $_POST['ctUser'];
        $password = $_POST['ctPassword'];
        $terminos = $_POST['checkbox'];
        // $_SESSION[]
        if(empty($terminos) || empty($user) || empty($password)){
             
            echo "<p>se requiere rellenar epacios";
        }else{
            
            if($user){
                $validacion = "SELECT*FROM user, usercli";
            }else{
                echo "<p>nombre de usuario incorrecto</p>";
            }
            if($password){
                $validacion = "SELECT*FROM user, passcli";
            }else{
                echo "<p>contraseña de usuario incorrecto</p>";
            }

        }


    }

}

?>