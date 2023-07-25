<?php
include_once 'lib/database/database.php';

    $conexion = databaseConexion::conexion();

if (isset($_GET["idcola"])) {
    $idColaborador = $_GET["idcola"];

    $stmt = $conexion->prepare("SELECT * FROM colaborador WHERE idcol = ?");
    $stmt->bind_param("i", $idColaborador);
    $stmt->execute();
    $result = $stmt->get_result();
    $Colaborador = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "Error: ID de colaborador no encontrado.";
    exit();
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
            <h1 >Empleados</h1>
            <div class="form">
                <form action="" method="POST">
                    <input type="hidden" name="idcol" id="Idcol" value="<?= $Colaborador["idcol"] ?? "No definido" ?>" >
                    <div>
                        <label class="tex" for="">Nombre:</label>
                        <input type="text" name="nomcol" id="Nomcol" value="<?= $Colaborador["nomcol"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Email: </label>
                        <input type="email" name="emacol" id="emacol" value="<?= $Colaborador["emacol"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Direccion: </label>
                        <input type="text" name="dircol" id="dircol" value="<?= $Colaborador["dircol"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Telefono:</label>
                        <input type="number" name="telcol" id="telcol" value="<?= $Colaborador["telcol"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Rol:</label>
                        <input type="text" name="rolcol" id="rolcol" value="<?= $Colaborador["rolcol"] ?? "No definido" ?>">
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