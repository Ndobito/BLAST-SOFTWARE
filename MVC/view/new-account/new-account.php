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
                    <div class="input-check">
                        <input type="checkbox"> <p> Terminos y condiciones <a id="window-up" href="#">Mas Información</a></p>
                    </div>
                        <div id="window">
                            <div class="container-window">
                                <i id="exit-window" class="fa-solid fa-xmark"></i>
                                <h1>Terminos y Condiciones</h1>
                                <p>La veterinaria Animal World recopilara la información conforme a lo señalado por la Ley 1712 de 2014 en lo relacionado con información reservada y clasificada. Es posible que la información que recopilamos en nuestro sitio web (por ejemplo: el nombres, las búsquedas realizadas, las páginas visitadas y la duración de la sesión del usuario) se combinen para analizar estadísticamente el tráfico y nivel de utilización del sitio web. Esta información se recopila para mejorar el rendimiento de nuestras plataformas.
                                <br><br>
                                En aquellos casos en los cuales el Ciudadano-Usuario publique libre y voluntariamente en el sitio web cualquier información adicional a la solicitada que tenga el carácter de clasificada, se entenderá que ha consentido la revelación de esta en los términos señalados en el artículo 18 de la Ley 1712 de 2014. En el mismo sentido, si la información que sea publicada por la entidad es sujeta a reserva o clasificada, los usuarios deberán hacer las reclamaciones respectivas ante el sitio en los términos señalados en la Ley 1712 de 2014.</p>
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
    <script src="assets/Javascript/New-Account.js"></script>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
        <!-- Pop-up Window -->
        <script src="assets/Javascript/popup-window.js"></script>

</body>

</html>