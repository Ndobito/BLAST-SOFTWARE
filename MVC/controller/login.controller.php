<?php

include_once "model/login.php";

class loginController{
    private $object;

    public function __construct(){
        $this -> object = new Login(); 
    }

    public function Index(){
        $style = "<link rel='stylesheet' href='assets/css/style-login.css'>"; 
        require_once "view/head.php"; 
        require_once "view/login/login.php"; 
        require_once "view/footer.php"; 
    }

    public function Evaluar(){
        require_once "view/index/index.php";
    }


}




?>