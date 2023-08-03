<body>
    <div class="container">
        <div class="edit">
            <div class="header">
                <div class="logo">
                    <img src="assets/img/logo-removebg.png" alt="Animal World">
                </div>
                <div class="informacion-title">
                    <h1>Editar Cliente</h1>
                    <h3>Tu información es importante</h3>
                </div>
            </div>
            <div class="form">
                <form action="?b=editarinfo&s=GuardarInfoCli&idcli=<?= $cliente['idcli']; ?>" method="POST">
                    <input type="hidden" name="idcli" id="Idcli" value="<?= $cliente["idcli"] ?? "No definido" ?>">
                    <div class="input-container">
                        <label class="tex" for="">Nombre</label>
                        <input type="text" name="nomcli" id="Nomcli" class="input"
                            value="<?= $cliente["nomcli"] ?? "No definido" ?>">
                        <span>Nombre</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">E-mail</label>
                        <input type="email" name="emacli" id="emacli" class="input"
                            value="<?= $cliente["emacli"] ?? "No definido" ?>">
                        <span>E-mail</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Usuario</label>
                        <input type="text" name="usercli" id="Usercli" class="input"
                            value="<?= $cliente["usercli"] ?? "No definido" ?>">
                        <span>Usuario</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Direccion</label>
                        <input type="text" name="dircli" id="dircli" class="input"
                            value="<?= $cliente["dircli"] ?? "No definido" ?>">
                        <span>Direccion</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Zona</label>
                        <select name="zona" class="input">
                            <option disabled
                                <?php echo ($cliente['tzonecli'] <> "urbana" && $cliente['tzonecli'] <> "rural") ? "selected" : ""; ?>>
                                Seleccione una zona</option>
                            <option value="urbana" <?php echo ($cliente['tzonecli'] === "urbana") ? "selected" : ""; ?>>
                                Urbana</option>
                            <option value="rural" <?php echo ($cliente['tzonecli'] === "rural") ? "selected" : ""; ?>>
                                Rural</option>
                        </select>
                        <span>Zona</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Telefono</label>
                        <input type="number" name="telcli" id="telcli" class="input"
                            value="<?= $cliente["telcli"] ?? "00000000000" ?>">
                        <span>Telefono</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Telefono alternativo</label>
                        <input type="number" name="telaltcli" id="telaltcli" class="input"
                            value="<?= $cliente["telaltcli"]  ?? "00000000000" ?>">
                        <span>Telefono alternativo</span>
                    </div>
                    <div class="buttons">
                        <input type="submit" name="btnEditar" value="Guardar" class="btn-save btn">
                        <a href="?b=profile&s=Inicio&p=admin" class="btn-regresar btn">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="assets/Javascript/edit-and-save.js"></script>

</html>