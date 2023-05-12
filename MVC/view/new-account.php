<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva cuenta</title>
    <link rel="stylesheet" href="view/css/style-new-account.css">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
</head>

<body>
    <div class="container-background">
        <div class="container-form">
            <h2>Crear cuenta</h2>
            <form id="myForm">
                <div id="parent-container-form-user">
                    <div class="NameandLastname">
                        <div class="input-container">
                            <label>Nombre</label>
                            <input type="text" name="nombre" required id="input-obligatorio">
                        </div>

                        <div class="input-container">
                            <label>Apellido</label>
                            <input type="text" name="apellido" required id="input-obligatorio">
                        </div>
                    </div>
                    <label>Email</label>
                    <input type="email" name="email" required id="input-obligatorio">

                    <label>Confirmar Email</label>
                    <input type="email" name="emailC" required id="input-obligatorio">

                    <label>Dirección de residencia</label>
                    <input type="text" name="addres" required id="input-obligatorio">

                    <label for="location">Tipo de ubicación</label>
                    <select type="select" required id="input-obligatorio">
                        <option value="" selected disabled>Selectiona el tipo de ubicación</option>
                        <option value="">Rural</option>
                        <option value="">Urbano</option>
                    </select>

                    <div class="numbers">
                        <div class="input-container">
                            <label>Numero de celular</label>
                            <input type="number" name="tel" required id="input-obligatorio">
                        </div>

                        <div class="input-container">
                            <label>Numero de celular 2</label>
                            <input type="number" name="tel2">
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="buttons-container">
                            <div class="return">
                                <a href="login.html">
                                    <span class="button">Volver</span>
                                </a>
                            </div>
                            <input type="submit" value="Siguiente" class="nextpet">
                        </div>
                        <div class="nextpet">
                            <a href="index.html">
                                <span class="button">Salir</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="parent-container-form-pet" style="display: none;">
                    <div class="NameandLastname">
                        <div class="input-container">
                            <label>Mascota</label>
                            <input type="text" name="mascota" required>
                        </div>
                    </div>
                    <label for="gender">Genero</label>
                    <select type="select" required id="input-obligatorio">
                        <option value="" selected disabled>Selectiona el genero de tu mascota</option>
                        <option value="">Macho</option>
                        <option value="">Hembra</option>
                    </select>

                    <label for="gender">Especie</label>
                    <select type="select" required id="input-obligatorio">
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
                                <a href="login.html">
                                    <span class="button">Siguiente</span>
                                </a>
                            </div>
                        </div>
                        <input type="reset" value="Guardar y agregar otra mascota">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="Javascript/new-account.js"></script>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
</body>

</html>