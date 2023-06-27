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
        $passsword = $_POST['ctPassword'];

        if (empty($usuario) || empty($passsword)) {
            
            header('Location: ?b=login');

        } else {
            $usuario_valido = $this->loginModel->validarUsuario($usuario, $passsword);

            if ($usuario_valido) {
                $tipoUsuario = $this->loginModel->obtenerRol($usuario);

                session_start();
                $_SESSION['usuario'] = $usuario;
                $_SESSION['tipoUsuario'] = $tipoUsuario;
                $_SESSION['ultimaActividad'] = time(); 

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
                $usuario_registrado = $this->loginModel->existeUsuario($usuario);

                if ($usuario_registrado) {
                    header('location: ?b=login&s=Inicio&p=true');
                } else {
                    header('location: ?b=login&s=Inicio&p=false');
                }
            }
        }
    }
}
