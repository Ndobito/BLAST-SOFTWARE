<?php 
include_once 'lib/database/database.php';

class info{
    private $conexion;
    private $pdo;
    protected $model;
    
    public function __construct()
    {
        $this->conexion = databaseConexion::conexion();
    }

    public function proveedor($idProveedor){
        $stmt = $this->conexion->prepare("SELECT * FROM proveedor WHERE idprov = ?");
        $stmt->bind_param("i", $idProveedor);
        $stmt->execute();
        $result = $stmt->get_result();
        $proveedor = $result->fetch_assoc();
        $stmt->close();
        return $proveedor;
    }
    public function actproveedor($idProv, $nombreProv, $direccionProv, $emailProv, $telefonoProv){
        $stmt = $this->conexion->prepare("UPDATE proveedor SET nomprov = ?, dirprov = ?, emaprov = ?, telprov = ? WHERE idprov = ?");
        $stmt->bind_param("ssssi", $nombreProv, $direccionProv, $emailProv, $telefonoProv, $idProv);
    
        if ($stmt->execute()) {
            header("Location: ?b=profile&s=Inicio&p=admin");
            exit();
        } else {
            echo "Error en la actualización: " . $stmt->error;
        }
    }



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


    // colaborador

    public function empleado($idColaborador){
        $stmt = $this->conexion->prepare("SELECT * FROM colaborador WHERE idcol = ?");
        $stmt->bind_param("i", $idColaborador);
        $stmt->execute();
        $result = $stmt->get_result();
        $colaborador = $result->fetch_assoc();
        $stmt->close();
        return $colaborador;
    }
    public function actualizaempleado($idCol, $nombreCol, $direccionCol, $emailCol, $telefonoCol, $rolCol){
        $stmt = $this->conexion->prepare("UPDATE colaborador SET nomcol = ?, dircol = ?, emacol = ?, telcol = ?, rolcol = ? WHERE idcol = ?");
        $stmt->bind_param("sssssi", $nombreCol, $direccionCol, $emailCol, $telefonoCol, $rolCol, $idCol);
    
        if ($stmt->execute()) {
            header("Location: ?b=profile&s=Inicio&p=admin");
            exit();
        } else {
            echo "Error en la actualización: " . $stmt->error;
        }
    }

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

    public function eliminar($data) {
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


    ////clinetes
    public function cliente($idCliente){
        $stmt = $this->conexion->prepare("SELECT * FROM cliente WHERE idcli = ?");
        $stmt->bind_param("i", $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        $cliente = $result->fetch_assoc();
        $stmt->close();
        return $cliente;
    }
    public function actualizacliente($idCli, $nombreCli, $emailCli,  $userCli, $direccionCli, $tzonecli, $telefonoCli, $telefonoaltCli){

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

    ////mascota

    public function mascota($idMascota){
        $stmt = $this->conexion->prepare("SELECT * FROM mascota WHERE idmas = ?");
        $stmt->bind_param("i", $idMascota);
        $stmt->execute();
        $result = $stmt->get_result();
        $mascota = $result->fetch_assoc();
        $stmt->close();
        return $mascota;
    }
    public function actualizamas($idmas, $nombremas, $edadmas,  $genmas, $espciemas){

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



}
?>