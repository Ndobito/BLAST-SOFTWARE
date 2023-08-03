<body>
    <div class="container">
        <div class="edit">
            <div class="header">
                <div class="logo">
                    <img src="assets/img/logo-removebg.png" alt="Animal World">
                </div>
                <div class="informacion-title">
                    <h1>Editar Proveedor</h1>
                    <h3>Tu información es importante</h3>
                </div>
            </div>
            <div class="form">
                <form action="?b=profile&s=updateProfile&p=proveedor&idprov=<?= $proveedor['idprov']; ?>" method="POST">
                    <input type="hidden" name="ctIdProv" id="ctIdProv"
                        value="<?= $proveedor["idprov"] ?? "No definido" ?>">
                    <div class="input-container">
                        <label class="tex" for="">Nombre</label>
                        <input type="text" name="ctNomProv" id="ctNomProv"
                            value="<?= $proveedor["nomprov"] ?? "No definido" ?>" class="input" required>
                        <span>Nombre</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Direccion</label>
                        <input type="text" name="ctDirProv" id="ctDirProv"
                            value="<?= $proveedor["dirprov"] ?? "No definido" ?>" class="input" required>
                        <span>Direccion</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">E-mail</label>
                        <input type="email" name="ctEmaProv" id="ctEmaProv"
                            value="<?= $proveedor["emaprov"] ?? "No definido" ?>" class="input" required>
                        <span>E-mail</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Telefono</label>
                        <input type="number" name="ctTelProv" id="ctTelProv"
                            value="<?= $proveedor["telprov"] ?? "0000000000000" ?>" class="input" required>
                        <span>Telefono</span>
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