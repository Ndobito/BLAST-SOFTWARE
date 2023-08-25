<?php

include_once 'model/bookappointment.php'; 

class bookAppointmentController{

    private $object; 

    public function __construct(){
        $this->object = new bookAppointment(); 
    }

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/style-book-appointment.css'>"; 
        require_once "view/head.php"; 
        require_once "view/header.php"; 
        require_once "view/book-appointment/book-appointment.php"; 
        require_once "view/footer.php"; 
    }

    public function appointmentRequest(){
        if(empty($_POST['numid']) || empty($_POST['name']) || empty($_POST['addres']) || empty($_POST['phone']) || empty($_POST['email']) || empty($_POST['namepet']) || empty($_POST['genpet']) || empty($_POST['esppet']) || empty($_POST['motive']) || empty($_POST['service'])){
            redirect("?b=bookappointment&p=showForm")->error("Rellene nuevamente el formulario y asegurese de completar todos los campos")->send();
        }else{
            if($this->object->verifyLeterString($_POST['numid'])){
                redirect("?b=bookappointment&p=showForm")->error("El numero de identificacion no debe llevar letras")->send();
            }else{
                if($this->object->verifyNumberString($_POST['name'] || $this->object->verifyNumberString($_POST['namepet']))){
                    
                }else{}
            }
        }
    }
}
