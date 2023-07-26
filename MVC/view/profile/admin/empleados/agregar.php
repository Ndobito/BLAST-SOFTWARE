<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style-editarInfo.css">
    <link rel="shortcut icon" href="assets/img/logo.jpg" type="image/x-icon">
    <title>Animal World</title>
</head>

<body>
    <div class="container">
        <div class="edit">
            <h1>Guardar Empleado </h1>
            <div class="form">
                <form action="?b=editarinfo&s=GuardarColaborador" method="POST">
                    <input type="hidden" name="ctIdCol" id="ctIdCol">
                    <div>
                        <label class="tex" for="">Dni: </label>
                        <input type="Number" name="ctDniCol" id="ctDniCol">
                    </div>
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
                        <input type="text" name="ctDirEmp" id="ctDirEmp">
                    </div>

                    <div>
                        <label class="tex" for="">Telefono:</label>
                        <input type="number" name="ctTelCol" id="ctTelCol">
                    </div>

                    <div>
                        <label class="tex" for="">Rol:</label>
                        <input type="text" name="ctRolCol" id="ctRolCol">
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