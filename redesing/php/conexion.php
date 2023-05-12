<?php
    
try{
    $host = "localhost";
    $dbname = "veterinaria";
    $user = "root";
    $pass = ""; 
    $port = 8080;      

    $conexion = mysqli_connect($host, $dbname, $user, $pass, $port);
    echo "Conexion Exitosa"; 

}catch(Exception $e){
    echo "Error: ". $e -> getMessage();
}

?>