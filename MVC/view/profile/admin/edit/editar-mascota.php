
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
            <h1 >Editar Mascota</h1>
            <div class="form">
            <form action="?b=editarinfo&s=GuardarInfoMas&idmas<?= $mascota['idmas']; ?>" method="POST">
                <input type="hidden" name="idmas" id="Idmas" value="<?= $mascota["idmas"] ?? "No definido" ?>" >
                    <div>
                        <label class="tex" for="">Nombre:</label>
                        <input type="text" name="nommas" id="Nommas" value="<?= $mascota["nommas"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Edad: </label>
                        <input type="tex" name="edadmas" id="edadmas" value="<?= $mascota["edadmas"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Genero: </label>
                        <input type="text" name="genmas" id="genmas" value="<?= $mascota["genmas"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Especie:</label>
                        <input type="text" name="espmas" id="espmas" value="<?= $mascota["espmas"] ?? "No definido" ?>">
                    </div>
                    <div>
                    <input type="submit" name="btnEditar" value="Guardar">
                    </div>
                </form>
                <div>
                <a href="?b=profile&s=Inicio&p=admin"><input type="button" name="btnEditar" value="Cancelar"></a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>