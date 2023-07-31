<?php
include_once 'lib/database/database.php';

class Profile
{
    private $conexion;

    public $id, $nombre, $apellido, $nick, $direccion, $email, $numcel, $numcel2, $file;

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

    // -----Metodo para obtener los clientes en Profile----- //
    public function getCliente()
    {
        $query = "SELECT * FROM cliente";
        $result = $this->conexion->query($query);
        $cliente = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $cliente[] = $row;
            }
        }
        return $cliente;
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
    public function buscarEmpleado($buscar)
    {
        $query = "SELECT * FROM colaborador WHERE idcol LIKE '%$buscar%'";
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
         $query = "SELECT * FROM administrador WHERE nickadmin ='" . $nombreUsuario . "'";
         $stmt = $this->conexion->prepare($query);
         $stmt->execute();
         $result = $stmt->get_result();
         $administrador = $result->fetch_assoc();
         $stmt->close();
         return $administrador;
    }
    
    // -----Metodo para verificar la existencia del proveedor ----- //
    public function existProveedor($idProveedor)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM proveedor WHERE idprov = ?");
        $stmt->bind_param("i", $idProveedor);
        $stmt->execute();
        $result = $stmt->get_result();
        $proveedor = $result->fetch_assoc();
        $stmt->close();
        return $proveedor;
    }

    // -----Metodo para verificar la existencia del empleado ----- //
    public function existColaborador($idColaborador){
        try{
            $stmt = $this->conexion->prepare("SELECT * FROM colaborador WHERE idcol = ?");
            $stmt->bind_param("i", $idColaborador);
            $stmt->execute();
            $result = $stmt->get_result();
            $colaborador = $result->fetch_assoc();
            $stmt->close();
            return $colaborador;
        }catch(Exception $e){
            echo "Error : ". $e->getMessage();
        }
        
    }

    // -----Metodo para verificar la existencia del Cliente ----- //
    public function existCliente($idCliente){
        $stmt = $this->conexion->prepare("SELECT * FROM cliente WHERE idcli = ?");
        $stmt->bind_param("i", $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        $cliente = $result->fetch_assoc();
        $stmt->close();
        return $cliente;
    }

    // -----Metodo para verificar la existencia de la Mascota----- //
    public function mascota($idMascota){
        $stmt = $this->conexion->prepare("SELECT * FROM mascota WHERE idmas = ?");
        $stmt->bind_param("i", $idMascota);
        $stmt->execute();
        $result = $stmt->get_result();
        $mascota = $result->fetch_assoc();
        $stmt->close();
        return $mascota;
    }

    // -----Metodo para actualizar informacion de Usuario Admin----- //
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

    // -----Metodo para actualizar informacion de Proveedor----- //
    public function updateProveedor($idProv, $nombreProv, $direccionProv, $emailProv, $telefonoProv){
        $stmt = $this->conexion->prepare("UPDATE proveedor SET nomprov = ?, dirprov = ?, emaprov = ?, telprov = ? WHERE idprov = ?");
        $stmt->bind_param("ssssi", $nombreProv, $direccionProv, $emailProv, $telefonoProv, $idProv);
    
        if ($stmt->execute()) {
            header("Location: ?b=profile&s=Inicio&p=admin");
            exit();
        } else {
            echo "Error en la actualización: " . $stmt->error;
        }
    }

    // -----Metodo para actualizar informacion de Empleados----- //
    public function updateColaborador($idCol, $nombreCol, $direccionCol, $emailCol, $telefonoCol, $rolCol){
        $stmt = $this->conexion->prepare("UPDATE colaborador SET nomcol = ?, dircol = ?, emacol = ?, telcol = ?, rolcol = ? WHERE idcol = ?");
        $stmt->bind_param("sssssi", $nombreCol, $direccionCol, $emailCol, $telefonoCol, $rolCol, $idCol);
    
        if ($stmt->execute()) {
            header("Location: ?b=profile&s=Inicio&p=admin");
            exit();
        } else {
            echo "Error en la actualización: " . $stmt->error;
        }
    }

    // -----Metodo para actualizar informacion de Cliente----- //
    public function updateCliente($idCli, $nombreCli, $emailCli,  $userCli, $direccionCli, $tzonecli, $telefonoCli, $telefonoaltCli){

        try {
            $stmt = $this->conexion->prepare("UPDATE cliente SET nomcli = ?, emacli = ?, usercli = ?, dircli = ?, tzonecli = ?, telcli = ?, telaltcli = ?  WHERE idcli = ?");
            $stmt->bind_param("sssssssi",  $nombreCli, $emailCli,  $userCli, $direccionCli, $tzonecli, $telefonoCli, $telefonoaltCli, $idCli);
        
            if ($stmt->execute()) {
                header("Location: ?b=profile&s=Inicio&p=admin");
                exit();
            } else {
                echo "Error en la actualización: " . $stmt->error;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    // -----Metodo para actualizar informacion de Cliente----- //
    public function updateMascota($idmas, $nombremas, $edadmas,  $genmas, $espciemas){

        try {
            $stmt = $this->conexion->prepare("UPDATE mascota SET nommas = ?, edadmas = ?, genmas = ?, espmas = ? WHERE idmas = ?");
            $stmt->bind_param("ssssi",  $nombremas, $edadmas,  $genmas, $espciemas, $idmas);

            if ($stmt->execute()) {
                header("Location: ?b=profile&s=Inicio&p=admin");
                exit();
            } else {
                echo "Error en la actualización: " . $stmt->error;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // -----Metodo para agregar un nuevo Proveedor----- //
    public function GuardarProveedor($nombreProv, $direccionProv, $emailProv, $telefonoProv){
        try {
            $sql = 'INSERT INTO proveedor(idprov, nomprov, dirprov, emaprov, telprov) VALUES (?, ?, ?, ?, ?)';
            $stmt = $this->conexion->prepare($sql);
            if($stmt->execute(["sssi",  $nombreProv, $direccionProv, $emailProv, $telefonoProv])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // -----Metodo para agregar un nuevo Colaborador----- //
    public function GuardarColaborador( $dnicol, $nombreCol, $emailCol, $passwordCol, $direccionCol,  $telefonoCol, $rolCol){
        try {
            $sql = 'INSERT INTO colaborador(idcol, dnicol, nomcol, emacol, passcol, dircol, telcol, rolcol) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
            $stmt = $this->conexion->prepare($sql);
            if($stmt->execute(["ssssssi",  $dnicol, $nombreCol, $emailCol, $passwordCol, $direccionCol,  $telefonoCol, $rolCol])) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // -----Metodo para eliminar Colabordor----- //
    public function deleteColaborador($data) {
        $sql = "DELETE FROM colaborador WHERE idcol = ?";
        try {
            $this->conexion->prepare($sql)
            ->execute([
                $data->idcol
            ]);
        } catch (Exception $e) {
			die($e->getMessage());
		}
    }
}
