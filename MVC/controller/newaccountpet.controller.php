<?php

include_once "model/newAccountPet.php"; 

class newAccountPetController{
    private $object; 

    public function __construct(){
        $this -> object = new newAccountPet();
    }

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/style-new-account.css'>"; 
        require_once "view/head.php"; 
        require_once "view/new-account-pet/new-account-pet.php"; 
    }   

    public function GuardarPet(){
        $u = new newAccountPet(); 
        
        $u -> namepet = $_POST['ctNomMas']; 
        $u -> agepet = $_POST['ctAgeMas']; 
        $u -> genpet = $_POST['selGenPet'];
        $u -> esppet = $_POST['selEspPet'];
        $u -> idcli = $_REQUEST['p']; 


        $this->object->Registrar($u);
        header("Location: ?b=login"); 
    }

}
