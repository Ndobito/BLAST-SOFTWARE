<?php
include_once 'lib/database/database.php';

class Profile
{
    private $conexion;

    public $id, $nombre, $apellido, $nick, $direccion, $zona, $email, $numcel, $numcel2, $file;

    // -----Constructor de la Conexion-----//
    public function __construct()
    {
        $this->conexion = databaseConexion::conexion();
    }

    // ----- Metodo para obtener proveedores-----//
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

    // -----Metodo pata obtener los empleados en profile----- //
    public function getUsers()
    {
        $query = "SELECT * FROM usuario";
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

    // -----Metodo para obtener las mascotas en Profile----- //
    public function getMascota()
    {
        $query = "SELECT * FROM mascota";
        $result = $this->conexion->query($query);
        $mascota = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mascota[] = $row;
            }
        }

        return $mascota;
    }

    // -----Metodo para el buscador de clientes en Profile -----//
    public function buscarClientes($buscar)
    {
        $query = "SELECT * FROM cliente WHERE idcli LIKE '%$buscar%'";
        $result = $this->conexion->query($query);
        $cliente = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cliente[] = $row;
            }
        }
        return $cliente;
    }

    // -----Metodo del para el buscador de mascotas de Profile----- //
    public function buscarMascotas($buscar)
    {
        $query = "SELECT * FROM mascota WHERE idmas LIKE '%$buscar%'";
        $result = $this->conexion->query($query);
        $mascota = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mascota[] = $row;
            }
        }
        return $mascota;
    }

    // -----Metodo del para el buscador de proveedores de Profile----- //
    public function buscarProveedor($buscar)
    {
        $query = "SELECT * FROM proveedor WHERE idprov LIKE '%$buscar%'";
        $result = $this->conexion->query($query);
        $proveedores = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $proveedores[] = $row;
            }
        }
        return $proveedores;
    }

    // -----Metodo para el buscador de empleados en Profile----- //
    public function buscarColaborador($buscar)
    {
        $query = "SELECT * FROM usuario WHERE (privileges = " . Privilegios::Recepcionist->get() . " OR privileges = " . Privilegios::Doctor->get() . " OR privileges = " . Privilegios::Recepcionist->get() + Privilegios::Doctor->get() . ") AND (dniuser LIKE '%$buscar%' OR nameuser LIKE '%$buscar%' OR surnameuser LIKE '%$buscar%' OR nickuser LIKE '%$buscar%')";
        $result = $this->conexion->query($query);
        $empleados = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $empleados[] = $row;
            }
        }

        return $empleados;
    }


    // -----Metodo para Seleccionar el nombre del Usuario----- //
    public function selectUser($nombreUsuario)
    {
        $query = "SELECT * FROM usuario WHERE nickuser ='" . $nombreUsuario . "'";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $administrador = $result->fetch_assoc();
        $stmt->close();
        return $administrador;
    }

    // -----Metodo para verificar existencia en la base de datos ----- //
    public function existProfile($table, $param, $id)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM $table WHERE $param = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_assoc();
        $stmt->close();
        return $result;
    }

    // -----Metodo para actualizar informacion de Usuario----- //
    public function update(Profile $user)
    {
        $update = "UPDATE usuario SET dniuser = ?, nameuser = ?, surnameuser = ?, emailuser = ?, diruser = ?, zoneuser = ?, phoneuser = ?, phonealtuser = ? WHERE dniuser = ? ";

        try {
            $stmt = $this->conexion->prepare($update);
            $stmt->bind_param(
                "ssssssssi",
                $user->id,
                $user->nombre,
                $user->apellido,
                $user->email,
                $user->direccion,
                $user->zona,
                $user->numcel,
                $user->numcel2,
                $user->id
            );

            $stmt->execute();
            return true;
        } catch (Exception $e) {
            echo "Error al actualizar datos: " . $e->getMessage();
            return false;
        }
    }

    // -----Metodo para actualizar informacion de Proveedor----- //
    public function updateProveedor($idProv, $nombreProv, $direccionProv, $emailProv, $telefonoProv)
    {
        $stmt = $this->conexion->prepare("UPDATE proveedor SET nomprov = ?, dirprov = ?, emaprov = ?, telprov = ? WHERE idprov = ?");
        $stmt->bind_param("ssssi", $nombreProv, $direccionProv, $emailProv, $telefonoProv, $idProv);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // -----Metodo para actualizar informacion de Empleados----- //
    public function updateColaborador($idCol, $nombreCol, $direccionCol, $emailCol, $telefonoCol, $rolCol)
    {
        $stmt = $this->conexion->prepare("UPDATE colaborador SET nomcol = ?, dircol = ?, emacol = ?, telcol = ?, rolcol = ? WHERE idcol = ?");
        $stmt->bind_param("sssssi", $nombreCol, $direccionCol, $emailCol, $telefonoCol, $rolCol, $idCol);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // -----Metodo para actualizar informacion de Cliente----- //
    public function updateCliente($idCli, $nombreCli, $emailCli, $userCli, $direccionCli, $tzonecli, $telefonoCli, $telefonoaltCli)
    {

        try {
            $stmt = $this->conexion->prepare("UPDATE cliente SET numid = ?, nomcli = ?, emacli = ?, usercli = ?, dircli = ?, tzonecli = ?, telcli = ?, telaltcli = ?  WHERE numid = ?");
            $stmt->bind_param("ssssssssi", $idCli, $nombreCli, $emailCli, $userCli, $direccionCli, $tzonecli, $telefonoCli, $telefonoaltCli, $idCli);

            if ($stmt->execute()) {
                return true;
                exit();
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // -----Metodo para actualizar informacion de mascota----- //
    public function updateMascota($idmas, $nombremas, $edadmas, $genmas, $espciemas)
    {
        try {
            $stmt = $this->conexion->prepare("UPDATE mascota SET nommas = ?, edadmas = ?, genmas = ?, espmas = ? WHERE idmas = ?");
            $stmt->bind_param("ssssi", $nombremas, $edadmas, $genmas, $espciemas, $idmas);

            if ($stmt->execute()) {
                return true;
                exit();
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // -----Metodo para agregar un nuevo Proveedor----- //
    public function saveProveedor($nombreProv, $direccionProv, $emailProv, $telefonoProv)
    {
        try {
            $sql = 'INSERT INTO proveedor(idprov, nomprov, dirprov, emaprov, telprov) VALUES (?, ?, ?, ?, ?)';
            $stmt = $this->conexion->prepare($sql);
            if ($stmt->execute(["sssi", $nombreProv, $direccionProv, $emailProv, $telefonoProv])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // -----Metodo para agregar un nuevo Colaborador----- //
    public function saveColaborador($dnicol, $nombreCol, $emailCol, $passwordCol, $direccionCol, $telefonoCol, $rolCol)
    {
        try {
            $sql = 'INSERT INTO colaborador(dnicol, nomcol, emacol, passcol, dircol, telcol, rolcol) VALUES (?, ?, ?, ?, ?, ?, ?)';
            $stmt = $this->conexion->prepare($sql);
            if ($stmt->execute([$dnicol, $nombreCol, $emailCol, $passwordCol, $direccionCol, $telefonoCol, $rolCol])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function saveMascota($nombreMas, $edadMas, $generoMas, $especieMas)
    {
        try {
            $sql = 'INSERT INTO mascota(nommas, edadmas, genmas, espmas) VALUES (?, ?, ?, ?)';
            $stmt = $this->conexion->prepare($sql);

            if ($stmt->execute([$nombreMas, $edadMas, $generoMas, $especieMas])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    // -----Metodo para eliminar Profiles----- //
    public function deleteUser($table, $param, $id)
    {
        $sql = "DELETE FROM $table WHERE $param = ?";
        try {
            if ($this->conexion->prepare($sql)->execute([$id])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    // -----Metodo para verificar si un string contiene numeros----- //
    public function verifyNumberString($string)
    {
        return preg_match('/\d/', $string) === 1 ? true : false;
    }

    // -----Metodo para verificar que un string sea un correo electronico----- //
    public function verifyEmailString($string)
    {
        return filter_var($string, FILTER_VALIDATE_EMAIL) ? true : false;
    }

    // -----Metodo para verificar que entre los numero haya letras----- //
    public function verifyLeterString($number)
    {
        return preg_match('/[a-zA-Z]/', $number) === 1 ? true : false;
    }

    // -----Metodo para verificar contraseña----- //
    public function verifyPasswordString($password)
    {
        $longmin = 8;
        $mayus = true;
        $minus = true;
        $number = true;

        // -----Verificar longitud minima----- //
        $longpass = (strlen($password) < $longmin) ? false : true;
        // -----Verificar mayuscula----- //
        $mayuspass = ($mayus && preg_match('/[A-Z]/', $password)) ? true : false;
        // -----Verificar minuscula----- //
        $minuspass = ($minus && preg_match('/[a-z]/', $password)) ? true : false;
        // Verificar numeros----- //
        $numberpass = ($number && preg_match('/[0-9]/', $password)) ? true : false;

        return ($longpass === true && $mayuspass === true && $minuspass === true && $numberpass === true) ? true : false;
    }

    // ------Metodo para verificar si un usuario existe------ //
    public function userExist($param1, $param2, $table, $value)
    {
        try {
            $sql = "SELECT $param1 FROM $table WHERE $param2='" . $value . "'";
            $result = $this->conexion->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); // Obtener la fila del resultado como un array asociativo
                return $row[$param1]; // Devolver el valor del nombre de usuario si existe
            } else {
                return null; // Devolver null si el usuario no existe
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    // -----Metodo para Obtener Privilegios del Usuario------ //
    public function getPrivileges()
    {
        $query = "SELECT privileges FROM usuario WHERE nickuser = ?";
        $resultado = mysqli_execute_query($this->conexion, $query, [$_SESSION["usuario"]]);

        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            return (int) $row["privileges"];
        } else {
            return false;
        }
    }

}