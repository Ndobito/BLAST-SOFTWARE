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

    public function GuardarUser()
    {

        if (empty($_POST['ctNombre'] . " " . $_POST['ctApellido']) || empty($_POST['ctEmail']) || empty($_POST['ctNick']) || empty($_POST['ctPass']) || empty($_POST['ctAddres']) || empty($_POST['selTipoUbicacion']) || empty($_POST['ctTel'])) {
            setcookie("notify", serialize(["status" => "error", "message" => "Complete todos los campos con (*)"]), time() + 5, "/");
            header("Location: ?b=newaccount&s=Inicio");
        } else {
            if (isset($_POST['conditions']) && $_POST['conditions'] == "true") {
                $nombre = $_POST['ctNombre'] . " " .  $_POST['ctApellido'];
                if ($this->object->verifyNumberString($nombre)) {
                    setcookie("notify", serialize(["status" => "error", "message" => "El nombre no puede llevar valores numericos"]), time() + 5, "/");
                    header('Location: ?b=newaccount&s=Inicio');
                } else{
                    if($this->object->verifyLeterString($_POST['ctNumId'])){
                        redirect("?b=newaccount&s=Inicio")->error("El numero de identificacion no puede llevar letras")->send();
                    }else{
                        if($this->object->verifyEmailString($_POST['ctEmail']) && $this->object->verifyEmailString($_POST['ctEmailC'])){
                            redirect("?b=newaccount&s=Inicio")->error("El formato de las direcciones email no son validos")->send();
                        }else{
                            if($_POST['ctEmail'] <> $_POST['ctEmailC']){
                                redirect("?b=newaccount&s=Inicio")->error("Las direcciones email no coinciden")->send();
                            }else{
                                if($this->object->userExist(trim($_POST['ctNick']))){
                                    redirect("?b=newaccount&s=Inicio")->error("El Nickname ya se encuentra registrado")->send();
                                }else{ 
                                    if($this->object->verifyPasswordString($_POST['ctPass'])){
                                        if($this->object->verifyLeterString($_POST['ctTel']) && $this->object->verifyLeterString($_POST['ctTel2'])){
                                            redirect("?b=newaccount&s=Inicio")->error("Los numeros de telefono no pueden tener letras")->send();
                                        }else{
                                            $this->object->name = trim($nombre); 
                                            $this->object->numid = trim($nombre); 
                                            $this->object->email = trim($nombre); 
                                            $this->object->name = trim($nombre); 
                                            $this->object->name = trim($nombre); 
                                            $this->object->name = trim($nombre); 
                                            $this->object->pass = Privilegios::Admin->get() + Privilegios::User->get(); 
                                            $this->object->name = trim($nombre); 
                                        }
                                    }else{
                                        redirect("?b=newaccount&s=Inicio")->error("El Nickname ya se encuentra registrado")->send();
                                    }
                                }
                            }
                        }
                    }
                }
            } else {
                setcookie("notify", serialize(["status" => "error", "message" => "Acepte los Terminos y condiciones"]), time() + 5, "/");
                header("Location: ?b=newaccount&s=Inicio");
            }
        }
    }
}
