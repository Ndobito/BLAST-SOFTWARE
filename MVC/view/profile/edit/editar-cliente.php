<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>

<body>
    <div class="container">
        <div class="edit">
            <h1>Editar clientes</h1>
            <div class="form">
                <form action="?b=profile&s=updateProfile&p=cliente&numid=<?= $cliente['numid']; ?>" method="POST">
                    <div>
                        <label class="tex" for="">Numero de Identificación: *</label>
                        <input type="number" name="idcli" id="Idcli" value="<?= $cliente["numid"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Nombre: *</label>
                        <input type="text" name="nomcli" id="Nomcli" value="<?= $cliente["nomcli"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Email: *</label>
                        <input type="email" name="emacli" id="emacli" value="<?= $cliente["emacli"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Nickuser: *</label>
                        <input type="text" name="usercli" id="Usercli" value="<?= $cliente["usercli"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Direccion: *</label>
                        <input type="text" name="dircli" id="dircli" value="<?= $cliente["dircli"] ?? "No definido" ?>">
                    </div>
                    <div>
                        <label class="tex" for="">Zona: *</label>
                        <select name="zona">
                            <option disabled <?php echo ($cliente['tzonecli'] <> "urbana" && $cliente['tzonecli'] <> "rural") ? "selected" : ""; ?>>Seleccione una zona</option>
                            <option value="urbana" <?php echo ($cliente['tzonecli'] === "urbana") ? "selected" : ""; ?>>Urbana</option>
                            <option value="rural" <?php echo ($cliente['tzonecli'] === "rural") ? "selected" : ""; ?>>Rural</option>
                        </select>
                    </div>
                    <div>
                        <label class="tex" for="">Telefono: *</label>
                        <input type="number" name="telcli" id="telcli" value="<?= $cliente["telcli"] ?? "" ?>" placeholder="Ingrese su numero de Telefono">
                    </div>
                    <div>
                        <label class="tex" for="">Telefono alternativo:</label>
                        <input type="number" name="telaltcli" id="telaltcli" value="<?= $cliente["telaltcli"]  ?? "" ?>" placeholder="Ingrese su numero de Telefono alternativo">
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