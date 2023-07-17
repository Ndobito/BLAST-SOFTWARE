<?php

include_once "model/newaccountpet.php";

class newAccountPetController
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
        require_once "view/new-account-pet/new-account-pet.php";
    }
}
