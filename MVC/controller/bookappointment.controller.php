<?php
include_once 'model/bookappointment.php'; 
include_once 'lib/database/database.php';
class bookAppointmentController{

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/style-book-appointment.css'>"; 
        require_once "view/head.php"; 
        require_once "view/header.php"; 
        require_once "view/book-appointment/book-appointment.php"; 
        require_once "view/footer.php"; 
        
    }

    public function AgendarCita(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fecha = $_POST['fecha'];
            $nombre = $_POST['nombre'];
            $telefono= $_POST['telefono'];
            $email= $_POST['email'];
            $nommascota= $_POST['nommascota'];
            $especie= $_POST['especie'];
            $genero= $_POST['genero'];
            $motivo= $_POST['motivo'];
            $observacion= $_POST['observacion'];
           
            $hora = $_POST['hora'];
            $dniuser = $_POST['dniuser'];
            
            $asicita = $_POST['asicita'];


            $conexion =  databaseConexion::conexion(); 
            
            $citasModel = new CitasModel($conexion);
            $horasDisponibles = $citasModel->obtenerHorasDisponibles($fecha, $asicita);

            // Verificar disponibilidad antes de insertar la cita
        if ($citasModel->verificarDisponibilidad($fecha, $hora, $asicita)) {
            redirect("?b=bookappointment")->error("El doctor ya tiene una cita programada a esa hora")->send();
            return;
        }
        
            if ($citasModel->AgendarCita($fecha, $nombre, $telefono, $email, $nommascota, $especie, $genero, $motivo, $observacion, $hora, $dniuser,  $asicita)) {
                
                redirect("?b=bookappointment")->success("Su Cita A Sido Asignada Correctamente")->send();
            } else {
               
                redirect("?b=bookappointment")->error("No Se Pudo Agendar Tu Cita Intenta Nuevamente Por Favor")->send();
            }
            
            $conexion->close();            
        }
    }
    

    }
    


$controller = new bookAppointmentController();


?>
