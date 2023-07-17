<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/style-editar.css">
    <title>editar producto</title>
    <header>
        <div class="imagen-logo">
            <img class="logo" src="assets/img/logo-removebg.png" alt="">
        </div>
        <div class="informacion-title">
            <h1>AGREGAR PRODUCTO</h1>
            <h3>Animal World</h3>
        </div>
    </header>
    <a href="?b=inventory"><button class="btn-regresar"><i class="fa-solid fa-arrow-left"></i></button></a>
    <div class="container">
        <form action="?b=inventory&s=guardar" method="post">

            <label for="idprov">ID proveedor:</label>
            <input type="text" id="idprov" name="idprov" placeholder="agrega el id del proveedor">

            <br>

            <label for="nombre">Nombre del producto:</label>
            <input type="text" id="nombre" name="nombre" placeholder="agrega el nombre del producto">
            <br>
            <label for="nombre">Descripcion:</label>
            <input type="text" id="descripcion" name="descripcion" placeholder="agrega  la descripcion del producto">
            <br>

            <label for="imagen">Selecciona una imagen:</label>
            <input type="file" id="imagen" name="imagen">

            <br>
            <label for="nombre">precio:</label>
            <input type="text" id="precio" name="precio" placeholder="agrega el precio del producto">
            <br>
            <label for="nombre">precio de venta:</label>
            <input type="text" id="precio de venta" name="venta" placeholder="agrega el precio de venta del producto">
            <br>
            <label for="nombre">Cantidad existente:</label>
            <input type="text" id="Cantidad existente" name="cantidad"
                placeholder="agrega la Cantidad existente del producto">
            <br>
            <label for="nombre">categoria:</label>
            <input type="text" id="categoria" name="categoria" placeholder="agrega la categoria del producto">
            <br>
            <button class="btn-save">Guardar</button>
            <br> 

        </form>


    </div>
</head>

<body>
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>

</body>

</html>