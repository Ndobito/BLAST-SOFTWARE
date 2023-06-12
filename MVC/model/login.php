<?php

class Login {
    private $conexion;

    public function __construct() {
        $this->conexion = databaseConexion::conexion();
    }

    public function validarUsuario($usuario, $contrasena) {
        $query = "SELECT * FROM cliente WHERE usercli = '$usuario' AND passcli = '$contrasena'";
        $resultado = mysqli_query($this->conexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true; // El usuario y la contraseña son válidos
        } else {
            return false; // El usuario o la contraseña son incorrectos
        }
    }

    public function existeUsuario($usuario) {
        $query = "SELECT * FROM cliente WHERE usercli = '$usuario'";
        $resultado = mysqli_query($this->conexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true; // El usuario está registrado
        } else {
            return false; // El usuario no está registrado
        }
    }
}

?>
