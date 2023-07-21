
<body>
    <div class="container-background">
        <div class="container-form">
            <h2>Crear cuenta</h2>
            <?php 
                $id = $_REQUEST['p'];
                echo "<form action='?b=newaccountpet&s=GuardarPet&p=$id' method='POST'>";
            ?>
                <div id="parent-container-form-pet">
                    <div class="NameandLastname">
                        <div class="input-container">
                            <label>Mascota <strong>*</strong></label>
                            <input type="text" name="ctNomMas" required>
                        </div>
                    </div>
                    <div class="NameandLastname">
                        <div class="input-container">
                            <label>Edad (meses) <strong>*</strong></label>
                            <select type="select" name="selAgeMas" id="input-obligatorio" required>
                                <option selected disabled>Seleccione una opcion</option>
                                <option value="Menos de Un año">menos de un año</option>
                                <option value="Un año">1 año</option>
                                <option value="Dos año">2 años</option>
                                <option value="Tres año">3 años</option>
                                <option value="Cuatro año">4 años</option>
                                <option value="Cinco años">5 años</option>
                                <option value="Mas de cinco años">Mas de cinco años</option>
                            </select>
                        </div>
                    </div>
                    <label for="gender">Genero <strong>*</strong></label>
                    <select type="select" name="selGenMas" required id="input-obligatorio">
                        <option value="" selected disabled>Selectiona el genero de tu mascota</option>
                        <option value="M">Macho</option>
                        <option value="H">Hembra</option>
                    </select>

                    <label for="gender">Especie <strong>*</strong></label>
                    <select type="select" name="selEspMas" required id="input-obligatorio">
                        <option value="" selected disabled>Selectiona la especie</option>
                        <option value="perro">Perro</option>
                        <option value="gato">Gato</option>
                        <option value="bovino">Bovino</option>
                        <option value="equino">Equino</option>
                        <option value="porcino">Porcino</option>
                        <option value="ave">Ave</option>
                    </select>
                    <div class="buttons">
                        <div class="buttons-container">
                            <div class="nextpet">
                                <input type="submit" value="Crear perfil">
                            </div>
                        </div>
                        <input type="reset" name="" value="Agregar Nueva Mascota">
                    </div>
                </div>
            </form>          
        </div>
    </div>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
</body>

</html>