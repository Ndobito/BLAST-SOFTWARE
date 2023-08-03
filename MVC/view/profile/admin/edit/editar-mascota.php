
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
                        <select name="selGenMas" id="selGenMas">
                            <option value="Macho" <?php echo ($mascota["genmas"] === "Macho") ? "selected" : "" ?> >Macho</option>
                            <option value="Hembra" <?php echo ($mascota["genmas"] === "Hembra") ? "selected" : "" ?>>Hembra</option>
                        </select>
                    </div>
                    <div>
                        <label class="tex" for="">Especie:</label>
                        <select name="selEspMas" id="selEspMas">
                            <option disabled <?php echo ($mascota["espmas"] <> "canino" && $mascota["espmas"] <> "felino" && $mascota["espmas"] <> "bovino" && $mascota["espmas"] <> "equino" && $mascota["espmas"] <> "ave" && $mascota["espmas"] <> "desconocino") ? "selected" : "" ?>>Seleccione una opcion</option>
                            <option value="canino" <?php echo ($mascota["espmas"] === "canino") ? "selected" : "" ?> >Canino</option>
                            <option value="felino" <?php echo ($mascota["espmas"] === "felino") ? "selected" : "" ?>>Felino</option>
                            <option value="bovino" <?php echo ($mascota["espmas"] === "bovino") ? "selected" : "" ?>>Bovino</option>
                            <option value="equino" <?php echo ($mascota["espmas"] === "equino") ? "selected" : "" ?>>Equino</option>
                            <option value="ave" <?php echo ($mascota["espmas"] === "ave") ? "selected" : "" ?>>Ave</option>
                            <option value="desconocida" <?php echo ($mascota["espmas"] === "desconocida") ? "selected" : "" ?>>Otro</option>
                        </select>
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