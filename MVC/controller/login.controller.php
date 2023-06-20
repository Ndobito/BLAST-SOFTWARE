<?php

include_once "model/login.php";

class LoginController
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new Login();
    }

    public function Inicio()
    {
        $style = "<link rel='stylesheet' href='assets/css/style-login.css'>";
        require_once "view/head.php";
        require_once "view/login/login.php";
    }

    public function revicion()
    {
        $usuario = $_POST['ctUser'];
        $passsword = $_POST['ctPassword'];
        $terminos = $_POST['checkbox'];

        if (empty($terminos) || empty($usuario) || empty($passsword)) {
            header('Location: ?b=login');
        } else {
            $usuario_valido = $this->loginModel->validarUsuario($usuario, $passsword);

            if ($usuario_valido) {
                $tipoUsuario = $this->loginModel->obtenerRol($usuario);

                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['tipoUsuario'] = $tipoUsuario;
                $_SESSION['ultimaActividad'] = time(); // Guardar el tiempo de última actividad

                switch ($tipoUsuario) {
                    case "cliente":
                        header('Location: ?b=profile');
                        break;
                    case "administrador":
                        header('Location: ?b=profileadministrador');
                        break;
                    case "colaborador":
                        header('Location: ?b=profilecolaborador');
                        break;
                    default:
                        // Redirigir a una página de error o manejar el caso adecuadamente
                        break;
                }

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



if (isset($_SESSION['ultimaActividad'])) {
    $tiempoInactividad = 1 * 60; // 1 minuto
    $tiempoActual = time();
    $tiempoTranscurrido = $tiempoActual - $_SESSION['ultimaActividad'];

    if ($tiempoTranscurrido > $tiempoInactividad) {
        session_unset();
        session_destroy();
        header('Location: ?b=login');
        exit();
    }

    $_SESSION['ultimaActividad'] = $tiempoActual; 
}
