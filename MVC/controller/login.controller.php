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

    public function validarUser()
    {
        $usuario = $_POST['ctUser'];
        $passEncrypt = md5($_POST['ctPassword']);
        var_dump($passEncrypt);

        if (empty($usuario) || empty($passEncrypt)) {
            header('Location: ?b=login');
        } else {
            $usuario_valido = $this->loginModel->validarUsuario($usuario);
            $password_valido = $this->loginModel->validarPassword($passEncrypt);
            if ($usuario_valido) {
                if ($password_valido) {
                    $tipoUsuario = $this->loginModel->obtenerRol($usuario);

                    session_start();
                    $_SESSION['usuario'] = $usuario;
                    $_SESSION['tipoUsuario'] = $tipoUsuario;
                    $_SESSION['ultimaActividad'] = time();
                    setNotify("success", "Ha iniciado sesión correctamente");
                    switch ($tipoUsuario) {
                        case "cliente":
                            header('Location: ?b=profile&s=Inicio&p=customer');
                            break;
                        case "administrador":
                            header('Location: ?b=profile&s=Inicio&p=admin');
                            break;
                        case "colaborador":
                            $rolColaborador = $this->loginModel->obtenerRolColaborador($usuario);
                            switch ($rolColaborador) {
                                case "veterinario":
                                    header('Location: ?b=profile&s=Inicio&p=vet');
                                    break;
                                case "recepcionista":
                                    header('Location: ?b=profile&s=Inicio&p=recepcionist');
                                    break;
                                case "colaborador":
                                    header('Location: ?b=profilecolaborador&s=Inicio&p=collaborator');
                                    break;
                                default:
                                    // Redirigir a una página de error o manejar el caso adecuadamente
                                    break;
                            }
                            break;
                        default:
                            // Redirigir a una página de error o manejar el caso adecuadamente
                            break;
                    }

                    exit();
                } else {
                    redirect("?b=login&s=Inicio&p=admin")->error("usuario y/o contraseña incorrectos")->send();
                }
            } else {
                setcookie("notify", serialize(["status" => "error", "message" => "Usuario y/o contraseña incorrectos, por favor verifique"]), time() + 5, "/");
                header('location: ?b=login&s=Inicio&p=admin');
            }
        }
    }
}
