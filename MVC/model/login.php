<?php

class Login
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = databaseConexion::conexion();
    }

    public function validarUsuario($usuario, $contrasena)
    {
        $query = "(SELECT 'cliente' AS rol FROM cliente WHERE usercli = '$usuario' AND passcli = '$contrasena') UNION (SELECT 'administrador' AS rol FROM administrador WHERE nickadmin = '$usuario' AND passadmin = '$contrasena') UNION (SELECT 'colaborador' AS rol FROM colaborador WHERE nomcol = '$usuario' AND passcol = '$contrasena')";

        $resultado = mysqli_query($this->conexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function existeUsuario($usuario)
    {
        $query = "(SELECT 'cliente' AS rol FROM cliente WHERE usercli = '$usuario')
                  UNION
                  (SELECT 'administrador' AS rol FROM administrador WHERE nomadmin = '$usuario')
                  UNION
                  (SELECT 'colaborador' AS rol FROM colaborador WHERE nomcol = '$usuario')";
        $resultado = mysqli_query($this->conexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true; // El usuario está registrado
        } else {
            return false; // El usuario no está registrado
        }
    }

    public function obtenerRol($usuario)
    {
        $query = "(SELECT 'cliente' AS rol FROM cliente WHERE usercli = '$usuario')
                  UNION
                  (SELECT 'administrador' AS rol FROM administrador WHERE nickadmin = '$usuario')
                  UNION
                  (SELECT 'colaborador' AS rol FROM colaborador WHERE nomcol = '$usuario')";
        $resultado = mysqli_query($this->conexion, $query);

        if ($fila = mysqli_fetch_assoc($resultado)) {
            return $fila['rol'];
        } else {
            return false;
        }
    }

    public function obtenerRolColaborador($usuario)
    {
        $query = "SELECT rolcol FROM colaborador WHERE nomcol = '$usuario'";
        $resultado = mysqli_query($this->conexion, $query);

        if ($fila = mysqli_fetch_assoc($resultado)) {
            return $fila['rolcol'];
        } else {
            return false;
        }
    }
}