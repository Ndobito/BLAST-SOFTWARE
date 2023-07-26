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
            <h1>Editar Proveedor</h1>
            <div class="form">
                <form action="?b=editarinfo&s=GuardarInfoProv&idprod=<?= $proveedor['idprov']; ?>" method="POST">
                    <input type="hidden" name="ctIdProv" id="ctIdProv"
                        value="<?= $proveedor["idprov"] ?? "No definido" ?>">
                    <div>
                        <label class="tex" for="">Nombre:</label>
                        <input type="text" name="ctNomProv" id="ctNomProv"
                            value="<?= $proveedor["nomprov"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Direccion: </label>
                        <input type="text" name="ctDirProv" id="ctDirProv"
                            value="<?= $proveedor["dirprov"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Email: </label>
                        <input type="email" name="ctEmaProv" id="ctEmaProv"
                            value="<?= $proveedor["emaprov"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Telefono:</label>
                        <input type="number" name="ctTelProv" id="ctTelProv"
                            value="<?= $proveedor["telprov"] ?? "0000000000000" ?>">
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