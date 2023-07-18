<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style-editar.css">
    <title>editar producto</title>
    <header>
            <div class="imagen-logo">
            <img class="logo" src="assets/img/logo-removebg.png" alt="">
            </div>
            <div class="informacion-title">
                <h1>EDITAR REGISTROS</h1>
                <h3>Animal World</h3>
            </div>
    </header>
    <a href="?b=inventory"><button class="btn-regresar"><i class="fa-solid fa-arrow-left"></i></button></a> 
    <div class="container">
    <form action= "?b=inventory&s=edit" method="post">

        <label for="nombre">Nombre del producto:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Edita el nombre del producto" value="<?= $producto["nomprod"] ?? "" ?>">
<br>
        <label for="nombre">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion" placeholder="Edita la descripcion del producto" value="<?= $producto["desprod"] ?? "" ?>">
<br>
      
         <label for="imagen">Selecciona una imagen:</label>
         <input type="file" id="imagen" name="imagen">
        
<br>
        <label for="nombre">precio:</label>
        <input type="text" id="precio" name="precio" placeholder="Edita el precio del producto" value="<?= $producto["precprod"] ?? "" ?>">
<br>
        <label for="nombre">precio de venta:</label>
        <input type="text" id="precio de venta" name="venta" placeholder="Edita el precio de venta del producto" value="<?= $producto["precvenprod"] ?? "" ?>">
<br>
        <label for="nombre">Cantidad existente:</label>
        <input type="text" id="Cantidad existente" name="cantidad" placeholder="Edita la Cantidad existente del producto" value="<?= $producto["stockprod"] ?? "" ?>">
<br>
        <label for="nombre">categoria:</label>
        <input type="text" id="categoria" name="categoria" placeholder="Edita la categoria del producto" value="<?= $producto["catprod"] ?? "" ?>">
<br>
        <label for="nombre">proveedor:</label>
        <input type="text" id="proveedor" name="proveedor" placeholder="Edita el proveedor del producto" value="<?= $producto["idprov"] ?? "" ?>">
<br>
        <input type="hidden" name="idprod" value="<?= $producto["idprod"] ?>">
        <button class="btn-save" type="submit">Guardar</button>
        
        </form>
    </div>
</head>
<body>
        <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
 
</body>
</html>
