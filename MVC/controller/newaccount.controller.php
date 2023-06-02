<?php

require_once "model/newAccount.php"; 

class newAccountController{

    private $object; 

    public function __construct(){
        $this -> object = new newAccount();
    }

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/style-new-account.css'>"; 
        require_once "view/head.php"; 
        require_once "view/new-account/new-account.php"; 
    }   

    public function GuardarUser(){
        $m = new newAccount(); 
        $nombre = $_POST['ctNombre'] ." ".  $_POST['ctApellido']; 
        $m -> name = trim($nombre); 
        $m -> email = $_POST['ctEmail']; 
        $m -> uname = $_POST['ctNick']; 
        $m -> pass = $_POST['']; 
        $m -> dir = $_POST['']; 
        $m -> zone = $_POST['']; 
        $m -> phone = $_POST['']; 
        $m -> phonealt = $_POST[''];

        $this->object->Registrar($m); 
    }
}

?>