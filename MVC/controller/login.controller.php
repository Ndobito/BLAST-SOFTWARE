<?php

include_once "model/login.php";

class loginController{
    private $object;

    public function __construct(){
        $this -> object = new Login(); 
    }

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/style-login.css'>"; 
        require_once "view/login/login.php"; 
    }

    // public function Evaluar(){
    //     require_once "view/index/index.php";
    // }


}

?>