<?php
include_once 'lib/database/database.php';

class Profile
{
    private $conexion;

    public $id, $nombre, $apellido, $nick, $direccion, $email, $numcel, $numcel2, $file;

    public function __construct()
    {
        $this->conexion = databaseConexion::conexion();
    }
    // Metodo para Seleccionar el nombre del Usuario
    public function selectUser($nombreUsuario)
    {
        $query = "SELECT * FROM administrador WHERE nickadmin ='" . $nombreUsuario . "'";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $administrador = $result->fetch_assoc();
        $stmt->close();
        return $administrador;
    }
    public function update(Profile $administrador)
    {
        $update = "UPDATE administrador SET nomadmin = ?, apeadmin = ?, nickadmin = ?, diradmin = ?, emaadmin = ?, teladmin = ?, teladmin2 = ? WHERE idadmin = ? ";

        try {
            $stmt = $this->conexion->prepare($update);
            $stmt->bind_param(
                "sssssssi",
                $administrador->nombre,
                $administrador->apellido,
                $administrador->nick,
                $administrador->direccion,
                $administrador->email,
                $administrador->numcel,
                $administrador->numcel2,
                $administrador->id
            );

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error al actualizar datos: " . $e->getMessage();
            return false;
        }
    }


    public function getProveedores()
    {
        $query = "SELECT * FROM proveedor";
        $result = $this->conexion->query($query);
        $proveedores = array();

        if ($result->num_rows > 0) {
            // Recorrer los resultados y almacenarlos en el array $proveedores
            while ($row = $result->fetch_assoc()) {
                $proveedores[] = $row;
            }
        }

        return $proveedores;
    }
    public function buscarProveedor($buscar)
    {
        $query = "SELECT * FROM proveedor WHERE nomprov LIKE '%$buscar%'";
        $result = $this->conexion->query($query);
        $proveedores = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $proveedores[] = $row;
            }
        }
        return $proveedores;
    }

    public function getEmpleado()
    {
        $query = "SELECT * FROM colaborador";
        $result = $this->conexion->query($query);
        $empleado = array();

        if ($result->num_rows > 0) {
            // Recorrer los resultados y almacenarlos en el array $proveedores
            while ($row = $result->fetch_assoc()) {
                $empleado[] = $row;
            }
        }
        return $empleado;
    }
    public function buscarEmpleado($buscar)
    {
        $query = "SELECT * FROM colaborador WHERE idcol LIKE '%$buscar%' OR dnicol LIKE '%$buscar%' OR nomcol LIKE '%$buscar%'";
        $result = $this->conexion->query($query);
        $empleados = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $empleados[] = $row;
            }
        }

        return $empleados;
    }

    public function getCliente()
    {
        $query = "SELECT * FROM cliente";
        $result = $this->conexion->query($query);
        $cliente = array();

        if ($result->num_rows > 0) {
            // Recorrer los resultados y almacenarlos en el array $proveedores
            while ($row = $result->fetch_assoc()) {
                $cliente[] = $row;
            }
        }
        return $cliente;
    }
    public function getMascota()
    {
        $query = "SELECT * FROM mascota";
        $result = $this->conexion->query($query);
        $mascota = array();

        if ($result->num_rows > 0) {
            // Recorrer los resultados y almacenarlos en el array $proveedores
            while ($row = $result->fetch_assoc()) {
                $mascota[] = $row;
            }
        }

        return $mascota;
    }
}