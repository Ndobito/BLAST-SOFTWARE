<?php

include_once 'model/bookappointment.php'; 

class bookAppointmentController{

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/style-book-appointment.css'>"; 
        require_once "view/head.php"; 
        require_once "view/header.php"; 
        require_once "view/book-appointment/book-appointment.php"; 
        require_once "view/footer.php"; 
    }

}
