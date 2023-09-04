<?php 
include_once 'lib/database/database.php';
class CitasModel {
    private $conexion; 

    public function __construct($conexion){
        $this->conexion = $conexion;
    }


    public function verificarDisponibilidad($fecha, $hora, $asicita) {
        try {
            $sql = "SELECT COUNT(*) AS count FROM cita WHERE feccit = ? AND horcit = ? AND asicita = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("sss", $fecha, $hora, $asicita);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            
            return $row['count'] > 0;
        } catch (PDOException $ex) {
            return false;
        }
    }
    public function obtenerHorasDisponibles($fecha, $asicita) {
        try {
            $sql = "SELECT DISTINCT horcit FROM cita WHERE feccit = ? AND asicita = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ss", $fecha, $asicita);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $horasDisponibles = array();
            while ($row = $result->fetch_assoc()) {
                $horasDisponibles[] = $row['horcit'];
            }

            return $horasDisponibles;
        } catch (PDOException $ex) {
            return false;
        }
    }
    public function AgendarCita($fecha, $nombre, $telefono, $email, $nommascota, $especie, $genero, $motivo, $observacion,  $hora, $dniuser, $asicita) {
        try {
            $sql = "INSERT INTO cita (feccit, nomclicit, telcit, emacit, nommascit, espmascit, genmascit, motcit, observcit, horcit, dniuser, asicita) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([$fecha, $nombre, $telefono, $email, $nommascota, $especie, $genero, $motivo, $observacion,  $hora, $dniuser, $asicita]);
            return true;
        } catch (PDOException $ex) {
            return false;
        }
    }
  
    }
    

?>
