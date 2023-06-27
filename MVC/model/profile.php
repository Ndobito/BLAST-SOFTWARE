<?php
include_once 'lib/database/database.php';

class Profile
{
    private $conexion;

    public $id, $nombre, $apellido, $direccion, $email, $numcel, $numcel2, $file; 

    public function __construct()
    {
        $this->conexion = databaseConexion::conexion();
    }
    // Metodo para Seleccionar el nombre del Usuario
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
    public function update(Profile $administrador)
    {
        $update = "UPDATE administrador SET nomadmin = ?, apeadmin = ?, diradmin = ?, emaadmin = ?, teladmin = ?, teladmin2 = ? WHERE idadmin = ? ";        
        try{
            $this->conexion->prepare($update)->execute(array(
                $administrador -> nombre, 
                $administrador -> apellido, 
                $administrador -> direccion, 
                $administrador -> email, 
                $administrador -> numcel, 
                $administrador -> numcel2, 
                $administrador -> id, 
            ));

        }catch(Exception $e){
            echo "Error al actualizar datos: ". $e->getMessage(); 
        }
    }

    
}
