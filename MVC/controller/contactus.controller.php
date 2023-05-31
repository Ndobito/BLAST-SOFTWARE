<?php

include_once 'model/contactus.php'; 

class contactUsController{

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/style-contact-us.css'>"; 
        require_once "view/head.php"; 
        require_once "view/header.php"; 
        require_once "view/contact-us/contact-us.php"; 
        require_once "view/footer.php"; 
    }

}
