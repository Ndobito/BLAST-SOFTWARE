<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.jpg" type="image/x-icon">
    <title>Inventario</title>
    <link rel="stylesheet" href="../../assets/css/style-inventory.css">
</head>
<body>
        <div class="container">
            <header>
                <h1>INVENTARIO</h1>
                <img class="logo" src="assets/img/logo-removebg.png" alt="">
                <h3>Animal World</h3>
            </header>           
                <div class="container-button">
                    <div class="search-bar">
                        <form id="buscador-form" action="?b=inventory&s=listado" method="get">
                            <input id="buscador" name="buscador" type="text" placeholder="Buscar">
                            <button class="btn-buscar" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <script>
                                const bf = document.querySelector("#buscador-form");
                                const bi = document.querySelector("#buscador");
                                bf.addEventListener("submit", (e) => {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    let url = bf.getAttribute("action");
                                    url += "&search=" + bi.value;
                                    window.location.href = url;
                                })
                            </script>
                        </form>
                        <a href="?b=inventory&s=agregar"><button class="btn-agregar"><i class="fa-solid fa-plus"  style="margin-right: 5px";></i>  Agregar</button></a>
                    </div> 
                </div>
                <div class="container-1">
                    <table class="content-table"> 
                    <thead>
                        <tr> 
                            <th>ID</th>
                            <th>nombre del producto</th>
                            <th>descripcion</th>
                            <th>imagen</th>
                            <th>precio</th>
                            <th>precio venta</th>
                            <th>cantidad existente</th>
                            <th>categoria</th>
                            <th>nombre del distribuidor</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php 
                        if (count($items) > 0) {   
                        foreach($items as $e) {
                            ?>
                            <tr>
                            <td><?= $e["idprod"] ?></td>
                            <td><?= $e["nomprod"] ?></td>
                            <td><?= $e["desprod"] ?></td>
                            <td></td>
                            <td><?= $e["precprod"] ?></td>
                            <td><?= $e["precvenprod"] ?></td>
                            <td><?= $e["stockprod"] ?></td>
                            <td><?= $e["catprod"] ?></td>
                            <td><?= $e["nomprov"] ?></td>
                            <td><a href="?b=inventory&s=editar&idprod=<?= $e["idprod"] ?>"><button class="btn-editar"><i class="fa-solid fa-pen"></i></button></a></td>
                            <td><a href="?b=inventory&s=eliminar&idprod=<?= $e["idprod"] ?>"><button class="btn-borrar" ><i class="fa-solid fa-trash"></i></button></a></td>
                        </tr>        
                            <?php
                        }
                        } else {
                            ?>
                            <tr>
                                <td colspan="11">No hay elementos</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>             
             </div>  
        </div>
        <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
</body>
</html>