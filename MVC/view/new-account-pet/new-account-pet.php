
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
                            <label>Edad</label>
                            <input type="number" name="ctAgeMas" required>
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
                        <option value="">Porcion</option>
                        <option value="">Ave</option>
                    </select>
                    <div class="buttons">
                        <div class="buttons-container">
                            <div class="return1">
                                <span class="button">Volver</span>
                            </div>
                            <div class="nextpet">
                                <input type="submit" value="Guardar">
                            </div>
                        </div>
                        <input type="reset" value="Guardar y agregar otra mascota">
                    </div>
                </div>
            </form>          
        </div>
    </div>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
</body>

</html>