<?php
echo "hola Mundo"; 
include 'conexion.php';
$conectar = $conexion; 
if(isset($_POST['submit'])){
    $id = $_POST['ctUser']; 
    $pass = $_POST['ctPassword']; 

    $consulta = "SELECT * FROM cliente"; 

    $mostrar = mysqli_query($conectar, $consulta);
    echo "Conexion Exitosa"; 
    // while($result = mysqli_fetch_array($mostrar)){
    //     echo "Hola";   
    // }
}

?>