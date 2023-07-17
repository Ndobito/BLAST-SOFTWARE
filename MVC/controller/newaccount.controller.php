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
        $m = new newAccount();
        $nombre = $_POST['ctNombre'] . " " .  $_POST['ctApellido'];
        $m->name = trim($nombre);
        $m->email = $_POST['ctEmail'];
        $m->uname = $_POST['ctNick'];
        $m->pass = $_POST['ctPass'];
        $m->dir = $_POST['ctAddres'];
        $m->zone = $_POST['selTipoUbicacion'];
        $m->phone = $_POST['ctTel'];
        $m->phonealt = $_POST['ctTel2'];

        $this->object->Registrar($m);

        $_POST['ctNombre']  = "";
        $_POST['ctApellido'] = "";
        $_POST['ctEmail'] = "";
        $_POST['ctNick'] = "";
        $_POST['ctPass'] = "";
        $_POST['ctAddres'] = "";
        $_POST['selTipoUbicacion'] = "";
        $_POST['ctTel'] = "";
        $_POST['ctTel2'] = "";

        redirect("Location: ?b=newaccountpet")->success("Se ha guardo el usuario correctamente <b>")->send();
    }
}
