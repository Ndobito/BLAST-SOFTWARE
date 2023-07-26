<?php 
include_once 'lib/database/database.php';

class info{
    private $conexion;
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



    public function guardarproveedor($idProv, $nombreProv, $direccionProv, $emailProv, $telefonoProv){
        try {
            $sql = 'INSERT INTO proveedor (idprov, nomprov, dirprov, emaprov, telprov)
                    VALUES (?, ?, ?, ?, ?)';
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("issss", $idProv, $nombreProv, $direccionProv, $emailProv, $telefonoProv);
            $stmt->execute();
            if ($stmt->execute()) {
                header("Location: ?b=profile&s=Inicio&p=admin");
                exit();
            } else {
                echo "Error en la actualización: " . $stmt->error;
            }
            setcookie("notify", serialize(["message" => "Se ha agregado el proveedor"]), 5, "/");
            return true;
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
        $stmt = $this->conexion->prepare("UPDATE cliente SET nomcli = ?, emacli = ?, usercli = ?, dircli = ?, tzonecli = ?, telcli = ?, telaltcli = ?  WHERE idcli = ?");
        $stmt->bind_param("sssssssi",  $nombreCli, $emailCli,  $userCli, $direccionCli, $tzonecli, $telefonoCli, $telefonoaltCli, $idCli);
    
        if ($stmt->execute()) {
            header("Location: ?b=profile&s=Inicio&p=admin");
            exit();
        } else {
            echo "Error en la actualización: " . $stmt->error;
        }
    }

    ////mascota

    
}
?>