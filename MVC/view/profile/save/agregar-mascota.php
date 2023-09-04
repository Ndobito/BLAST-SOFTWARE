<body>
    <div class="container">
        <div class="edit">
            <div class="header">
                <div class="logo">
                    <img src="assets/img/logo-removebg.png" alt="Animal World">
                </div>
                <div class="informacion-title">
                    <h1>Agrega a tu mascota</h1>
                    <h3>Tu información es importante</h3>
                </div>
            </div>
            <div class="form">
                <form action="?b=profile&s=saveMascota" method="POST">
                    <input type="hidden" name="IdMas" id="IdMas">
                    <div class="input-container">
                        <label for="NomMas">Nombre</label>
                        <input type="text" name="NomMas" id="NomMas" class="input" autocomplete="off">
                        <span>Nombre</span>
                    </div>
                    <div class="input-container">
                        <label for="EdadMas">Edad</label>
                        <input type="number" name="EdadMas" id="EdadMas" class="input" autocomplete="off">
                        <span>Dirección</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Género</label>
                        <select name="genmas" id="genmas" class="input">
                            <option value="Sexo">Seleccione Sexo</option>
                            <option value="Macho">Macho</option>
                            <option value="Hembra">Hembra</option>
                        </select>
                        <span>Género</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Especie</label>
                        <select name="espmas" id="espmas" class="input">
                            <option disabled selected>Seleccione especie</option>
                            <option value="Perro">Canino</option>
                            <option value="Gato">Felino</option>
                            <option value="Conejo">Ruedor</option>
                        </select>
                        <span>Especie</span>
                    </div>
                    <div class="input-container">
                        <label class="tex" for="">Identificación</label>
                        <input type="number" name="dniuser" id="dniuser"  class="input" value="<?= $mascota["dniuser"] ?? "No definido" ?>">
                        <span>Identificación</span>
                    </div>
                    <div class="buttons">
                        <input type="submit" name="btnAgregar" value="Guardar" class="btn-save btn">
                        <a href="?b=profile&s=Inicio&p=admin" class="btn-regresar btn">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="assets/Javascript/edit-and-save.js"></script>