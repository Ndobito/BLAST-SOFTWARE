<body>
    <div class="container">
        <div class="edit">
            <h1>Guardar Empleado </h1>
            <div class="form">
                <form action="?b=profile&s=saveProfile&p=colaborador" method="POST">
                    <input type="hidden" name="ctIdCol" id="ctIdCol">
                    <div>
                        <label class="tex" for="">Nombre:</label>
                        <input type="text" name="ctNomCol" id="ctNomCol">
                    </div>

                    <div>
                        <label class="tex" for="">Email: </label>
                        <input type="email" name="ctEmaCol" id="ctEmaCol">
                    </div>
                    <div>
                        <label class="tex" for="">Password: </label>
                        <input type="Password" name="ctPassCol" id="ctPassCol">
                    </div>

                    <div>
                        <label class="tex" for="">Direccion: </label>
                        <input type="text" name="ctDirCol" id="ctDirEmp">
                    </div>

                    <div>
                        <label class="tex" for="">Telefono:</label>
                        <input type="number" name="ctTelCol" id="ctTelCol">
                    </div>

                    <div>
                        <label class="tex" for="selRolUser">Rol:</label>
                        <select name="selRolUser" id="selRolUser">
                            <option selected disabled>seleccione un rol</option>
                            <option value="veterinario">Veterinario(a)</option>
                            <option value="recepcionista">Recepcionista</option>
                        </select>
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