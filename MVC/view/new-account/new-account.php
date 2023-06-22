<body>
    <div class="container-background">
        <div class="container-form">
            <h2>Crear cuenta</h2>
            <form id="myForm" action="?b=newaccount&s=GuardarUser" method="POST">
                <div id="parent-container-form-user">
                    <div class="NameandLastname">
                        <div class="input-container">
                            <label>Nombre</label>
                            <input type="text" name="ctNombre" required id="input-obligatorio">
                        </div>

                        <div class="input-container">
                            <label>Apellido</label>
                            <input type="text" name="ctApellido" required id="input-obligatorio">
                        </div>
                    </div>
                    <label>Email</label>
                    <input type="email" name="ctEmail" required id="input-obligatorio">

                    <label>Confirmar Email</label>
                    <input type="email" name="ctEmailC" required id="input-obligatorio">

                    <label>Nickname</label>
                    <input type="text" name="ctNick" required id="input-obligatorio">

                    <label>Contraseña</label>
                    <input type="password" name="ctPass" required id="input-obligatorio">

                    <label>Dirección de residencia</label>
                    <input type="text" name="ctAddres" required id="input-obligatorio">

                    <label for="location">Tipo de ubicación</label>
                    <select type="select" name="selTipoUbicacion" required id="input-obligatorio">
                        <option value="" selected disabled>Selectiona el tipo de ubicación</option>
                        <option value="rural" >Rural</option>
                        <option value="urbano">Urbano</option>
                    </select>

                    <div class="numbers">
                        <div class="input-container">
                            <label>Numero de celular</label>
                            <input type="number" name="ctTel" required id="input-obligatorio">
                        </div>

                        <div class="input-container">
                            <label>Numero de celular 2</label>
                            <input type="number" name="ctTel2">
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="buttons-container">
                            <div class="return">
                                <a href="?b=login">
                                    <span class="button">Volver</span>
                                </a>
                            </div>
                            <input type="submit" value="Siguiente" class="nextpet">
                        </div>
                        <div class="nextpet">
                            <a href="?b=index">
                                <span class="button">Salir</span>
                            </a>
                        </div>
                    </div>
                </div>
            
            </form>
        </div>
    </div>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
</body>

</html>