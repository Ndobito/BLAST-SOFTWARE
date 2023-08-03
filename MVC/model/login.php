<?php

class Login
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = databaseConexion::conexion();
    }

    public function validarUsuario($usuario)
    {
        $query = "(SELECT 'cliente' AS rol FROM cliente WHERE usercli = '$usuario') UNION (SELECT 'administrador' AS rol FROM administrador WHERE nickadmin = '$usuario') UNION (SELECT 'colaborador' AS rol FROM colaborador WHERE nomcol = '$usuario')";

        $resultado = mysqli_query($this->conexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function validarPassword($pass){
        $query = "(SELECT 'cliente' AS rol FROM cliente WHERE passcli = '$pass') UNION (SELECT 'administrador' AS rol FROM administrador WHERE passadmin = '$pass') UNION (SELECT 'colaborador' AS rol FROM colaborador WHERE passcol = '$pass')";

        $resultado = mysqli_query($this->conexion, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerPrivilegios() {
        $query = "(SELECT privilegios FROM administrador WHERE nickadmin = ?)";
        $resultado = mysqli_execute_query($this->conexion, $query, [$_SESSION["usuario"]]);

        if (mysqli_num_rows($resultado) > 0) {
            return mysqli_fetch_object($resultado);
        } else {
            return false;
        }
    }

    // public function existeUsuario($usuario)
    // {
    //     $query = "(SELECT 'cliente' AS rol FROM cliente WHERE usercli = '$usuario')
    //               UNION
    //               (SELECT 'administrador' AS rol FROM administrador WHERE nomadmin = '$usuario')
    //               UNION
    //               (SELECT 'colaborador' AS rol FROM colaborador WHERE nomcol = '$usuario')";
    //     $resultado = mysqli_query($this->conexion, $query);

    //     if (mysqli_num_rows($resultado) > 0) {
    //         return true; 
    //     } else {
    //         return false; 
    //     }
    // }

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