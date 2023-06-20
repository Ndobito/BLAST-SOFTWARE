<?php

require_once "model/dattabase.php"; 

class newAccountController{

    private $object; 

    public function __construct(){
        $this -> object = new newAccount();
    }

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/style-new-account.css'>"; 
        require_once "view/head.php"; 
        require_once "view/"; 
        require_once "view/footer.php"; 
    }   

    public function Guardar(){
        $m = new newAccount(); 

        $m -> name= $_REQUEST['']; 
        $m -> email = $_REQUEST['']; 
        $m -> uname = $_REQUEST['']; 
        $m -> pass = $_REQUEST['']; 
        $m -> dir = $_REQUEST['']; 
        $m -> zone = $_REQUEST['']; 
        $m -> phone = $_REQUEST['']; 
        $m -> phonealt = $_REQUEST[''];
    }
}

?>