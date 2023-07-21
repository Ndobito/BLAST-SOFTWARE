<?php

include_once "model/newAccountPet.php";

class newAccountPetController
{
    private $object;

    public function __construct()
    {
        $this->object = new newAccountPet();
    }

    public function Inicio()
    {
        $style = "<link rel='stylesheet' href='assets/css/style-new-account.css'>";
        require_once "view/head.php";
        require_once "view/new-account-pet/new-account-pet.php";
    }

    public function GuardarPet()
    {   

        $id = $_REQUEST['p']; 
        if (!empty($_POST['ctNomMas']) || !empty($_POST['selAgeMas']) || !empty($_POST['selGenMas']) || !empty($_POST['selEspMas'])) {
            setcookie("notify", serialize(["status" => "error", "message" => "Complete todos los campos con (*)"]), time() + 5, "/");
            header('Location: ?b=newaccountpet&s=Inicio&p='.$id);
        } else {
            $u = new newAccountPet();
            $u->namepet = $_POST['ctNomMas'];
            $u->agepet = $_POST['selAgeMas'];
            $u->genpet = $_POST['selGenMas'];
            $u->esppet = $_POST['selEspMas'];
            $u->idcli = $_REQUEST['p'];

            if ($this->object->Registrar($u)) {
                setNotify("success", "Perfil creado con exito!");
                header("Location: ?b=login");
            } else {
                setcookie("notify", serialize(["status" => "error", "message" => "hubo un problema al crear el usuario, intentelo nuevamente"]), time() + 5, "/");
                header('Location: ?b=login&s=Inicio');
            }
        }
    }
}
