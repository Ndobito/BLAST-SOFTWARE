<?php

require_once "model/newAccount.php";

class newAccountController
{

    private $object;

    public function __construct()
    {
        $this->object = new newAccount();
    }

    public function Inicio()
    {
        $style = "<link rel='stylesheet' href='assets/css/style-new-account.css'>";
        require_once "view/head.php";
        require_once "view/new-account/new-account.php";
    }

    public function GuardarUser(){ 
        $a = $_POST['ctNombre'] ." ".  $_POST['ctApellido']; 
        $nombre = trim($a); 
        $correo= $_POST['ctEmail']; 
        $apodo = $_POST['ctNick']; 
        $contraseña = $_POST['ctPass']; 
        $direccion = $_POST['ctAddres']; 
        $ubicacion = $_POST['selTipoUbicacion']; 
        $numcel = $_POST['ctTel']; 
        $numcel2 = $_POST['ctTel2'];
        
        if(empty($nombre) || empty($correo) || empty($apodo) || empty($contraseña) || empty($direccion) || empty($ubicacion) || empty($numcel)){
            header("Location: ?b=newaccount&s=Inicio&p=ifalse");   
        }else{

        }

        if(isset($_POST['conditions']) && $_POST['conditions'] == "true"){
            $m = new newAccount(); 
            $nombre = $_POST['ctNombre'] ." ".  $_POST['ctApellido']; 
            $nick = $_POST['ctNick'];
            if(preg_match('/\d/', $nombre)){
                header('Location: ?b=newaccount&s=Inicio&p=nfalse');
            } else if($_POST['ctEmail'] <> $_POST['ctEmailC']) {
                header('Location: ?b=newaccount&s=Inicio&p=efalse');
            } else if($this->object->userExist($nick) <> null ){
                header("Location: ?b=newaccount&s=Inicio&p=ufalse");
            } else {
                $m -> name = trim($nombre); 
                $m -> email = $_POST['ctEmail']; 
                $m -> uname = $_POST['ctNick']; 
                $m -> pass = $_POST['ctPass']; 
                $m -> dir = $_POST['ctAddres']; 
                $m -> zone = $_POST['selTipoUbicacion']; 
                $m -> phone = $_POST['ctTel']; 
                $m -> phonealt = $_POST['ctTel2'];
                
                $nickName = $_POST['ctNick']; 
                $this->object->Registrar($m);
                
                $id = $this -> object -> selectUser($nickName); 
                $_POST['ctNombre']  = ""; 
                $_POST['ctApellido'] = ""; 
                $_POST['ctEmail'] = ""; 
                $_POST['ctNick'] = ""; 
                $_POST['ctPass'] = ""; 
                $_POST['ctAddres'] = ""; 
                $_POST['selTipoUbicacion'] = ""; 
                $_POST['ctTel'] = ""; 
                $_POST['ctTel2'] = "";

                header("Location: ?b=newaccountpet&s=Inicio&p=$id"); 
            }
        } else{
            header("Location: ?b=newaccount&s=inicio&p=tfalse"); 
        }
    }
}
