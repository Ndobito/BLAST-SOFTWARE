<?php
include_once 'lib/database/database.php';

    $conexion = databaseConexion::conexion();

if (isset($_GET["idprod"])) {
    $idProveedor = $_GET["idprod"];

    $stmt = $conexion->prepare("SELECT * FROM proveedor WHERE idprov = ?");
    $stmt->bind_param("i", $idProveedor);
    $stmt->execute();
    $result = $stmt->get_result();
    $proveedor = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "Error: ID de proveedor no encontrado.";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idProv = $_POST["ctIdProv"];
    $nombreProv = $_POST["ctNomProv"];
    $direccionProv = $_POST["ctDirProv"];
    $emailProv = $_POST["ctEmaProv"];
    $telefonoProv = $_POST["ctTelProv"];

    $stmt = $conexion->prepare("UPDATE proveedor SET nomprov = ?, dirprov = ?, emaprov = ?, telprov = ? WHERE idprov = ?");
    $stmt->bind_param("ssssi", $nombreProv, $direccionProv, $emailProv, $telefonoProv, $idProv);

    if ($stmt->execute()) {
        header("Location: ?b=profile&s=Inicio&p=admin");
        exit();
    } else {
        echo "Error en la actualización: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
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
            <h1 >Editar Proveedor  </h1>
            <div class="form">
                <form action="" method="POST">
                    <input type="hidden" name="ctIdProv" id="ctIdProv" value="<?= $proveedor["idprov"] ?? "No definido" ?>" >
                    <div>
                        <label class="tex" for="">Nombre:</label>
                        <input type="text" name="ctNomProv" id="ctNomProv" value="<?= $proveedor["nomprov"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Direccion: </label>
                        <input type="text" name="ctDirProv" id="ctDirProv" value="<?= $proveedor["dirprov"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Email: </label>
                        <input type="email" name="ctEmaProv" id="ctEmaProv" value="<?= $proveedor["emaprov"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Telefono:</label>
                        <input type="number" name="ctTelProv" id="ctTelProv" value="<?= $proveedor["telprov"] ?? "No definido" ?>">
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