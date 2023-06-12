<?php

include_once "model/login.php";

class LoginController {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new Login();
        session_start(); // Iniciar la sesión
    }

    public function inicio() {
        $style = "<link rel='stylesheet' href='assets/css/style-login.css'>"; 
        require_once "view/head.php"; 
        require_once "view/login/login.php"; 
    }

    public function revicion() {
        $usuario = $_POST['ctUser'];
        $passsword = $_POST['ctPassword'];
        $terminos = $_POST['checkbox'];
    
        if (empty($terminos) || empty($usuario) || empty($passsword)) {
            echo "<p>Se requiere llenar todos los campos.</p>";
        } else {
            $usuario_valido = $this->loginModel->validarUsuario($usuario, $passsword);
    
            if ($usuario_valido) {
                // redirigir a perfil del usuario
                header('Location: http://localhost:8080/BLAST-SOFTWARE/MVC/?b=knowus');
                exit();
            } else {
                $usuario_registrado = $this->loginModel->existeUsuario($usuario);
                
                if ($usuario_registrado) {
                    echo "<p>Contraseña incorrecta.</p>";
                } else {
                    echo "<p>Usuario no registrado.</p>";
                }
            }
        }
    }
    
}
?>
