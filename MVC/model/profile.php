<?php
include_once 'lib/database/database.php';

class Profile
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = databaseConexion::conexion();
    }

    public function update($administrador)
    {
        $idamin = $administrador['idamin'];
        $nomadmin = $administrador['nomadmin'];
        $apeadmin = $administrador['apeadmin'];
        $emaadmin = $administrador['emaadmin'];
        $diradmin = $administrador['diradmin'];
        $teladmin = $administrador['teladmin'];
        $teladmin2 = $administrador['teladmin2'];

        $query = "UPDATE administrador SET nomadmin = ?, apeadmin = ?, emaadmin = ?, diradmin = ?, teladmin = ?, teladmin2 = ? WHERE idamin = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param( $nomadmin, $apeadmin, $emaadmin, $diradmin, $teladmin, $teladmin2, $idamin);
        $stmt->execute();
        $stmt->close();
    }

    public function selectUser($nombreUsuario)
    {
        $query = "SELECT * FROM administrador WHERE nomadmin = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $nombreUsuario);
        $stmt->execute();
        $result = $stmt->get_result();
        $administrador = $result->fetch_assoc();
        $stmt->close();
        return $administrador;
    }
}
