<?php

include_once "lib/database/database.php";

class restorePassword
{

    private $consulta;
    public function __construct()
    {
        try {
            $this->consulta = databaseConexion::conexion();
        } catch (Exception $e) {
            echo "Error de Conexion " . $e->getMessage();
        }
    }

    public function verifyUser($usuario)
    {
        $query = "(SELECT 'cliente' AS rol FROM cliente WHERE usercli = '$usuario')
                  UNION
                  (SELECT 'administrador' AS rol FROM administrador WHERE nickadmin = '$usuario')
                  UNION
                  (SELECT 'colaborador' AS rol FROM colaborador WHERE nomcol = '$usuario')";
        $resultado = mysqli_query($this->consulta, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyEmail($email, $user)
    {
        $query = "(SELECT 'cliente' AS rol FROM cliente WHERE emacli = '$email' AND usercli='$user') UNION (SELECT 'administrador' AS rol FROM administrador WHERE emaadmin = '$email' AND nickadmin='$user') UNION (SELECT 'colaborador' AS rol FROM colaborador WHERE emacol = '$email' AND nickcol='$user')";
        $resultado = mysqli_query($this->consulta, $query);

        if (mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
