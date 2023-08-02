<body>
    <div class="container">
        <div class="edit">
            <h1 >Editar Colaborador</h1>
            <div class="form">
            <form action="?b=profile&s=updateProfile&p=colaborador&idcola=<?= $colaborador['idcol']; ?>" method="POST">
                <input type="hidden" name="idcol" id="Idcol" value="<?= $colaborador["idcol"] ?? "No definido" ?>" >
                    <div>
                        <label class="tex" for="">Nombre:</label>
                        <input type="text" name="nomcol" id="Nomcol" value="<?= $colaborador["nomcol"] ?? "No definido" ?>" required>
                    </div>
                    <div>
                        <label class="tex" for="">Email: </label>
                        <input type="email" name="emacol" id="emacol" value="<?= $colaborador["emacol"] ?? "No definido" ?>" required>
                    </div>
                    <div>
                        <label class="tex" for="">Direccion: </label>
                        <input type="text" name="dircol" id="dircol" value="<?= $colaborador["dircol"] ?? "No definido" ?>" required>
                    </div>
                    <div>
                        <label class="tex" for="">Telefono:</label>
                        <input type="number" name="telcol" id="telcol" value="<?= $colaborador["telcol"] ?? "00000000000" ?>" required>
                    </div>
                    <div>
                        <label class="tex" for="">Rol:</label>
                        <input type="text" name="rolcol" id="rolcol" value="<?= $colaborador["rolcol"] ?? "No definido" ?>">
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