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

}

?>