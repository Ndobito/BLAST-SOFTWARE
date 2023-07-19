
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
                            <label>Mascota</label>
                            <input type="text" name="ctNomMas" required>
                        </div>
                    </div>
                    <div class="NameandLastname">
                        <div class="input-container">
                            <label>Edad (meses)</label>
                            <select type="select" name="ctAgemas" id="input-obligatorio" required>
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
                    <label for="gender">Genero</label>
                    <select type="select" name="selGenPet" required id="input-obligatorio">
                        <option value="" selected disabled>Selectiona el genero de tu mascota</option>
                        <option value="M">Macho</option>
                        <option value="H">Hembra</option>
                    </select>

                    <label for="gender">Especie</label>
                    <select type="select" name="selEspPet" required id="input-obligatorio">
                        <option value="" selected disabled>Selectiona la especie</option>
                        <option value="">Perro</option>
                        <option value="">Gato</option>
                        <option value="">Bovino</option>
                        <option value="">Equino</option>
                        <option value="">Porcino</option>
                        <option value="">Ave</option>
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