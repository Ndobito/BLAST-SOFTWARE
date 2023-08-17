<body>
    <div class="container">
        <div class="edit">
            <div class="header">
                <div class="logo">
                    <img src="assets/img/logo-removebg.png" alt="Animal World">
                </div>
                <div class="informacion-title">
                    <h1>Editar Colaborador</h1>
                    <h3>Tu información es importante</h3>
                </div>
            </div>
            <div class="form">
                <form action="?b=profile&s=updateProfile&p=colaborador&idcola=<?= $colaborador['idcol']; ?>"
                    method="POST">
                    <input type="hidden" name="idcol" id="Idcol" value="<?= $colaborador["idcol"] ?? "No definido" ?>">
                    <div class="input-container">
                        <label class="tex" for="">Nombre</label>
                        <input type="text" name="nomcol" id="Nomcol" class="input"
                            value="<?= $colaborador["nomcol"] ?? "No definido" ?>" required>
                        <span>Nombre</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">E-mail</label>
                        <input type="email" name="emacol" id="emacol" class="input"
                            value="<?= $colaborador["emacol"] ?? "No definido" ?>" required>
                        <span>E-mail</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Direccion</label>
                        <input type="text" name="dircol" id="dircol" class="input"
                            value="<?= $colaborador["dircol"] ?? "No definido" ?>" required>
                        <span>Direccion</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Telefono</label>
                        <input type="number" name="telcol" id="telcol" class="input"
                            value="<?= $colaborador["telcol"] ?? "00000000000" ?>" required>
                        <span>Telefono</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Rol</label>
                        <select name="rolcol" id="rolcol" class="input">
                            <option value="<?= $colaborador["rolcol"] ?? "No definido" ?>">
                                <?= $colaborador["rolcol"] ?? "No definido" ?></option>
                            <option value="veterinario">Veterinario(a)</option>
                            <option value="recepcionista">Recepcionista</option>
                        </select>
                        <span>Rol</span>
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