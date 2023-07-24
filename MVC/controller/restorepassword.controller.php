<?php 

include_once "model/restorepassword.php"; 

class restorePasswordController{

    private $object; 

    public function __construct(){
        $this -> object = new restorePassword();
    }

    public function Inicio(){
        $style = "<link rel='stylesheet' href='assets/css/style-olive-password.css'>"; 
        require_once "view/head.php";
        require_once "view/header.php";
        require_once "view/restore-password/restore-password.php";
        require_once "view/footer.php";  
    }

    public function sendEmail(){
        if(empty($_POST['ctUser']) && empty($_POST['ctEmail'])){
            redirect("?b=restorepassword")->error("Complete todos los campos y vuelva a enviar el formulario")->send();
        } else{
            $user = $_POST['ctUser'];
            $email = $_POST['ctEmail'];
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if($this->object->verifyUser($user)){
                    if($this->object->verifyEmail($email, $user)){
                        $asunto = "ANIMAL WORLD - RECUPERACION DE CONTRASEÑA"; 
                        $mensaje = "click aqui para recuperar la contraseña <a></a>"; 
                    }else{
                        redirect("?b=restorepassword")->error("El correo electronico no esta vinculado a ningun usuario")->send();
                    }
                }else{
                    redirect("?b=restorepassword")->error("El usuario no existe")->send();
                }
            } else{
                redirect("?b=restorepassword")->error("Direccion de correo electronico invalida")->send();
            }
        }
    }       

}

?>