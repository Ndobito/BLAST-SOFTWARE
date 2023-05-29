<?php

include_once "model/Index.php"; 

class indexController{
    private $object; 

    public function __construct(){
        $this -> object = new Index(); 
    }

    public function Inicio(){
        require_once "view/head.php"; 
        require_once "view/index/index.php"; 
        require_once "view/footer.php"; 
    }
}

?>