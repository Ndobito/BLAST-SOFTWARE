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
                $m = new newAccount();
                $nombre = $_POST['ctNombre'] . " " .  $_POST['ctApellido'];
                $nick = $_POST['ctNick'];
                if (preg_match('/\d/', $nombre)) {
                    setcookie("notify", serialize(["status" => "error", "message" => "El nombre no puede llevar valores numericos"]), time() + 5, "/");
                    header('Location: ?b=newaccount&s=Inicio');
                } else if ($_POST['ctEmail'] <> $_POST['ctEmailC']) {
                    setcookie("notify", serialize(["status" => "error", "message" => "Las direcciones email no coinciden"]), time() + 5, "/");
                    header('Location: ?b=newaccount&s=Inicio');
                } else if ($this->object->userExist($nick) <> null) {
                    setcookie("notify", serialize(["status" => "error", "message" => "El nikname no esta disponible"]), time() + 5, "/");
                    header("Location: ?b=newaccount&s=Inicio");
                } else {
                    $m->name = trim($nombre);
                    $m->email = $_POST['ctEmail'];
                    $m->uname = $_POST['ctNick'];
                    $m->pass = md5($_POST['ctPass']);
                    $m->dir = $_POST['ctAddres'];
                    $m->zone = $_POST['selTipoUbicacion'];
                    $m->phone = $_POST['ctTel'];
                    $m->phonealt = $_POST['ctTel2'];

                    $nickName = $_POST['ctNick'];
                    $this->object->Registrar($m);

                    $id = $this->object->selectUser($nickName);
                    $_POST['ctNombre']  = "";
                    $_POST['ctApellido'] = "";
                    $_POST['ctEmail'] = "";
                    $_POST['ctNick'] = "";
                    $_POST['ctPass'] = "";
                    $_POST['ctAddres'] = "";
                    $_POST['selTipoUbicacion'] = "";
                    $_POST['ctTel'] = "";
                    $_POST['ctTel2'] = "";
                    setNotify("success", "Usuario Creado con exito");
                    header("Location: ?b=newaccountpet&s=Inicio&p=$id");
                }
            } else {
                setcookie("notify", serialize(["status" => "error", "message" => "Acepte los Terminos y condiciones"]), time() + 5, "/");
                header("Location: ?b=newaccount&s=Inicio");
            }
        }
    }
}
