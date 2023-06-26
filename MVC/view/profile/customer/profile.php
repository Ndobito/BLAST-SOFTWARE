<body>
    <div class="returm">
        <a href="?b=index"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <div class="container">
        <!-- Body of the work -->
        <main>
            <div class="container-main-profile">
                <div class="left">
                    <div class="container-menu">
                        <div class="user">
                            <div class="img"></div>
                            <h1>Juan Eduardo Perez</h1>
                        </div>
                        <div class="menu">
                            <div id="btns-menu">
                                <button onclick="container(1)">INFORMACION</button>
                            </div>
                            <div>
                                <button onclick="container(2)">HISTORIAL</button>
                            </div>
                            <div>
                                <button onclick="container(3)">MASCOTAS</button>
                            </div>
                            <div>
                                <a href="?b=profile&s=cerrarSesion">
                                    <button>
                                        <i class="fa-solid fa-right-from-bracket fa-rotate-180"></i>
                                        SALIR
                                    </button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="right">
                    <div class="container-right" id="container-right">
                        <div class="user-information">
                            <h1>Usuario</h1>
                            <form id="form-user-information" action="#" method="post">
                                <label for="ctNameuser">Nombres</label>
                                <input type="text" name="ctNameUser" id="ctNameUser" disabled>
                                <label for="ctSurNameUser">Apellidos</label>
                                <input type="text" name="ctSurNameUser" id="ctSurNameUser" disabled>
                                <label for="ctNameuser">Direccion</label>
                                <input type="text" name="ctAdrUser" id="ctAdrUser" disabled>
                                <label for="selZoneResid">Zona de Residencia</label>
                                <select name="selZoneResid" id="selZoneResid" disabled>
                                    <option value="urbano">Urbano</option>
                                    <option value="rural">Rural</option>
                                </select>
                                <div>
                                    <div>
                                        <label for="ctEmailUser">Correo Eletrónico</label>
                                        <input type="text" name="ctEmailUser" id="ctEmailUser" disabled>
                                    </div>
                                    <div>
                                        <label for="ctEmailUser2">Confirmacion de Correo electronico:</label>
                                        <input type="text" name="ctEmailUser" id="ctEmailUser" disabled>
                                    </div>
                                    <div>
                                        <label for="ctNumCel">Numero de Celular 1</label>
                                        <input type="text" name="ctNumCel" id="ctNumCel" disabled>
                                    </div>
                                    <div>
                                        <label for="ctNumCel2">Numero de Celular 2</label>
                                        <input type="text" name="ctNumCel2" id="ctNumCel2" disabled>
                                    </div>
                                </div>
                                <input type="submit" id="disableForm1" value="Guardar" disabled>
                            </form>
                            <button id="enableForm1">Editar</button>
                        </div>
                    </div>
                    <div class="container-right2" id="container-right2">
                        <div class="slider-calendar" id="calendar"></div>
                        <div id="calendar-citas"></div>
                    </div>
                    <div class="container-right3" id="container-right3">
                        <div class="Pets">
                            <h1>Mascotas</h1>
                            <div>
                                <h2>Mascota 1</h2>
                                <form id="form-pet-information" action="#" method="post">
                                    <label for="">Nombre</label>
                                    <input type="text" name="ctNamePet" id="ctNamePet" disabled>
                                    <label for="selGenPet">Genero</label>
                                    <select name="selGenPet" id="selGenPet" disabled>
                                        <option value="m">Masculino</option>
                                        <option value="f">Femenino</option>
                                    </select>
                                    <label for="selSpePet">Especie</label>
                                    <select name="selSpePet" id="selSpePet" disabled>
                                        <option value="can">Can</option>
                                        <option value="felino">Felino</option>
                                        <option value="equino">Equino</option>
                                        <option value="bovino">Bovinos</option>
                                        <option value="porcino">Porcinos</option>
                                        <option value="ave">Ave</option>
                                    </select>
                                    <input id="disableForm2" type="submit" value="Guardar" disabled>
                                </form>
                                <button id="enableForm2">Editar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Menu Profile -->
    <script src="assets/Javascript/menu-profile.js"></script>
    <!-- Calendar -->
    <script src="assets/Javascript/calendar.js"></script>
    <!-- Form Disable and Enable -->
    <script src="assets/Javascript/form-disable-enable.js"></script>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
</body>

</html>