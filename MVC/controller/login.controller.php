<?php

include_once "model/login.php";

class loginController{
    private $object;

    public function __construct(){
        $this -> object = new Login(); 
    }

    public function Index(){

    }

    public function Evaluar(){
        require_once "view/index/index.php";
    }


}




?>