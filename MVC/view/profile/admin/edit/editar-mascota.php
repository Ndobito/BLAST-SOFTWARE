<body>
    <div class="container">
        <div class="edit">
            <div class="header">
                <div class="logo">
                    <img src="assets/img/logo-removebg.png" alt="Animal World">
                </div>
                <div class="informacion-title">
                    <h1>Editar Mascotas</h1>
                    <h3>Tu información es importante</h3>
                </div>
            </div>
            <div class="form">
                <form action="?b=editarinfo&s=GuardarInfoMas&idmas<?= $mascota['idmas']; ?>" method="POST">
                    <input type="hidden" name="idmas" id="Idmas" value="<?= $mascota["idmas"] ?? "No definido" ?>">
                    <div class="input-container">
                        <label class="tex" for="">Nombre</label>
                        <input type="text" name="nommas" id="Nommas" class="input"
                            value="<?= $mascota["nommas"] ?? "No definido" ?>">
                        <span>Nombre</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Edad</label>
                        <input type="number" name="edadmas" id="edadmas" class="input"
                            value="<?= $mascota["edadmas"] ?? "No definido" ?>">
                        <span>edad</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Género</label>
                        <select name="genmas" id="genmas" class="input">
                            <option value="<?= $mascota["genmas"] ?? "No definido" ?>">
                                <?= $mascota["genmas"] ?? "No definido" ?></option>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                        <span>Género</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Especie</label>
                        <select name="espmas" id="espmas" class="input">
                            <option value="<?= $mascota["espmas"] ?? "No definido" ?>">
                                <?= $mascota["espmas"] ?? "No definido" ?></option>
                            <option value="Perro">Canino</option>
                            <option value="Gato">Felino</option>
                            <option value="Conejo">Ruedor</option>
                        </select>
                        <span>Especie</span>
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