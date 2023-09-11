<body>
    <div class="container">
        <header>
            <div class="img-logp">
                <img class="logo" src="assets/img/logo-removebg.png" alt="">
            </div>
            <div class="text-logo">
                <h1>INVENTARIO</h1>
                <h3>Animal World</h3>
            </div>
        </header>
        <div class="child-container">
            <div class="container-button">
                <div class="search-bar">
                    <div class="search">
                        <a href="?b=profile&s=Inicio"><button class="btn-regresar"><i
                                    class="fa-solid fa-arrow-left"></i></button></a>
                        <form method='POST' action='?b=profile&s=buscarProducto'  onsubmit='return false;'>
                            <input type='text' class="form-control search-input" placeholder="Buscar" name="buscar_inventario" id="buscador searchinv">
                            <button class="btn-buscar" type="submit"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                            <!-- <script>
                                const bf = document.querySelector("#buscador-form");
                                const bi = document.querySelector("#buscador");
                                bf.addEventListener("submit", (e) => {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    let url = bf.getAttribute("action");
                                    url += "&search=" + bi.value;
                                    window.location.href = url;
                                })
                            </script> -->
                        </form>
                    </div>
                    <div class="search-right">
                        <a href="?b=inventory&s=showAdd">
                            <button class="btn-agregar">
                                <i class="fa-solid fa-plus"></i> Agregar
                            </button>
                        </a>
                    </div>
                    <div class="search-right">
                        <a href="?b=inventory&s=newCategory">
                            <button class="btn-agregar">
                                <i class="fa-solid fa-plus"></i> Nueva Categoria
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container-table1">
                <div class="table-wrapper">
                    <table class="table-container content-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>nombre del producto</th>
                            <th>descripcion</th>
                            <th>precio</th>
                            <th>precio venta</th>
                            <th>cantidad existente</th>
                            <th>categoria</th>
                            <th class="hide-on-small">nombre del distribuidor</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="resultados-inventario">
                            <?php
                            foreach ($productos as $e) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $e["idprod"] ?>
                                    </td>
                                    <td>
                                        <?php echo $e["nomprod"] ?>
                                    </td>
                                    <td>
                                        <?php echo $e["desprod"] ?>
                                    </td>
                                    <td>
                                        <?php echo $e["precprod"] ?>
                                    </td>
                                    <td>
                                        <?php echo $e["precvenprod"] ?>
                                    </td>
                                    <td>
                                        <?php echo $e["stockprod"] ?>
                                    </td>
                                    <td>
                                        <?php
                                        $categoriaEncontrada = false;
                                        foreach ($categorias as $categoria) {
                                            if ($categoria['idcat'] == $e["catprod"]) {
                                                echo $categoria['namecat'];
                                                $categoriaEncontrada = true;
                                                break; // Romper el bucle una vez que se ha encontrado la categoría
                                            }
                                        }
                                        if (!$categoriaEncontrada) {
                                            echo "Sin categoría";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $proveedorEncontrado = false;
                                        foreach ($proveedores as $proveedor) {
                                            if ($proveedor['idprov'] == $e["idprov"]) {
                                                echo $proveedor['nomprov'];
                                                $proveedorEncontrado = true;
                                                break; // Romper el bucle una vez que se ha encontrado el proveedor
                                            }
                                        }
                                        if (!$proveedorEncontrado) {
                                            echo "Sin proveedor";
                                        }
                                        ?>
                                    </td>
                                    <td><a href="?b=inventory&s=showEditar&idprod=<?= $e["idprod"] ?>"><button
                                                class="btn-editar"><i class="fa-solid fa-pen"></i></button></a></td>

                                    <td><a><button class="btn-borrar" onclick="deleteProduct(this.id)"
                                                id="<?= $e["idprod"] ?>"><i class="fa-solid fa-trash"></i></button></a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
<!--  -->
<script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
<!--  -->
<script src="assets/Javascript/deleteProduct.js"></script>
<!-- Library JQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Serach -->
<script src="assets/Javascript/real_time_search.js"></script>

</html>