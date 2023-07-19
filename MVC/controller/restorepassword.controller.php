<?php 

include_once "model/restorepassword.php"; 

class restorePasswordController{

    private $object; 

    public function __construct(){
        $this -> object = new restorePassword();
    }

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/style-olive-password.css'>"; 
        require_once "view/head.php";
        require_once "view/header.php";
        require_once "view/restore-password/restore-password.php";
        require_once "view/footer.php";  
    }

}

?>