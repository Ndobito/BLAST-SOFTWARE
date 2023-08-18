<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/style-editar.css">
    <title>editar producto</title>

<body>
    <header>
        <div class="imagen-logo">
            <img class="logo" src="assets/img/logo-removebg.png" alt="">
        </div>
        <div class="informacion-title">
            <h1>AGREGAR PRODUCTO</h1>
            <h3>Animal World</h3>
        </div>
    </header>

    <div class="container">
        <div class="regresar">
            <a href="?b=inventory&s=listado"><button class="btn-regresar"><i
                        class="fa-solid fa-arrow-left"></i></button>
            </a>
        </div>
        <form action="?b=inventory&s=guardar" method="post">
            <div class="input">
                <label for="idprov">ID proveedor:</label>
                <input type="text" id="idprov" name="idprov" placeholder="Agrega el id del proveedor">
            </div>
            <div class="input">

                <label for="nombre">Nombre del producto:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Agrega el nombre del producto">
            </div>
            <div class="input">
                <label for="nombre">Descripcion:</label>
                <input type="text" id="descripcion" name="descripcion"
                    placeholder="Agrega  la descripcion del producto">
            </div>
            <div class="input">
                <label for="imagen">Selecciona una imagen:</label>
                <input type="file" id="imagen" name="imagen">
            </div>

            <div class="input">
                <label for="nombre">precio:</label>
                <input type="text" id="precio" name="precio" placeholder="Agrega el precio del producto">

            </div>
            <div class="input">
                <label for="nombre">precio de venta:</label>
                <input type="text" id="precio de venta" name="venta"
                    placeholder="Agrega el precio de venta del producto">
            </div>
            <div class="input">
                <label for="nombre">Cantidad existente:</label>
                <input type="text" id="Cantidad existente" name="cantidad"
                    placeholder="Agrega la Cantidad existente del producto">
            </div>
            <div class="input">
                <label for="nombre">categoria:</label>
                <input type="text" id="categoria" name="categoria" placeholder="Agrega la categoria del producto">
            </div>
            <div class="button">
                <button class="btn-save">Guardar</button>
            </div>
        </form>
    </div>
    </head>
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
</body>

</html>