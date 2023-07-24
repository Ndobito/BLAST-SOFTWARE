<?php
include_once 'lib/database/database.php';

    $conexion = databaseConexion::conexion();


    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $idprov = $_POST["ctIdProv"];
    $nomprov = $_POST["ctNomProv"];
    $dirprov = $_POST["ctDirProv"];
    $emaprov = $_POST["ctEmaProv"];
    $telprov = $_POST["ctTelProv"];

    // Realiza la consulta SQL para guardar la información en la base de datos
    $sql = "INSERT INTO proveedor (idprov, nomprov, dirprov, emaprov, telprov) VALUES ('$idprov', '$nomprov', '$dirprov', '$emaprov', '$telprov')";
    
    if ($conexion->query($sql) === TRUE) {
      var_dump("setNotify");
        setNotify("success", "Se ha guardado el provedor  correctamente");
    } else {
        echo "Error al guardar la información del proveedor: " . $conexion->error;
    }
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style-editarInfo.css">
    <link rel="shortcut icon" href="assets/img/logo.jpg" type="image/x-icon">
    <title>Animal World</title>
</head>
<body>
    <div class="container">
        <div class="edit">
            <h1 >Guardar Proveedor  </h1>
            <div class="form">
                <form action="" method="POST">
                    <input type="hidden" name="ctIdProv" id="ctIdProv" >
                    <div>
                        <label class="tex" for="">Nombre:</label>
                        <input type="text" name="ctNomProv" id="ctNomProv">
                    </div>
                    <div>
                        <label class="tex" for="">Direccion: </label>
                        <input type="text" name="ctDirProv" id="ctDirProv">
                    </div>
                    <div>
                        <label class="tex" for="">Email: </label>
                        <input type="email" name="ctEmaProv" id="ctEmaProv">
                    </div>
                    <div>
                        <label class="tex" for="">Telefono:</label>
                        <input type="number" name="ctTelProv" id="ctTelProv" >
                    </div>
                    <div>
                        <input type="submit" name="btnEditar" value="Guardar">
                    </div>
                </form>
                <div>
                    <a href="?b=profile&s=Inicio&p=admin"><input type="submit" name="btnEditar" value="Cancelar"></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>