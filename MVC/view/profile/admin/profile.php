<div class="container">
    <div class="returm">
        <a href="?b=index"><i class="fa-solid fa-arrow-left"></i></a>
    </div> <!-- Body of the work -->
    <main>
        <div class="container-main-profile">
            <div class="left">
                <div class="container-menu">
                    <div class="user">
                        <div class="img"></div>
                        <h1>
                            <?php echo $usuario; ?>
                        </h1>
                        <h1>Administrador</h1>
                    </div>
                    <div class="menu">
                        <div id="btns-menu">
                            <button class="profile-adm-btn">INFORMACION</button>
                        </div>
                        <div>
                            <a href="?b=inventory&s=listado"><button>INVENTARIOS</button></a>
                        </div>
                        <div>
                            <button class="profile-adm-btn">PROVEEDORES</button>
                        </div>
                        <div>
                            <button class="profile-adm-btn">EMPLEADOS</button>
                        </div>
                        <div>
                            <button class="profile-adm-btn">CLIENTES</button>
                        </div>
                        <div>
                            <button class="profile-adm-btn">MASCOTAS</button>
                        </div>

                        <div>
                            <a href="?b=profile&s=cerrarSesion"><button><i
                                        class="fa-solid fa-right-from-bracket fa-rotate-180"></i> SALIR</button></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="right">
                <div class="profile-adm container-right" id="container-right">
                    <div class="user-information">
                        <h1>Datos</h1>
                        <form id="form-user-information" action="?b=profile&s=update" method="post">
                            <label for="ctNameuser">Nombres</label>
                            <input type="text" name="ctNameUser" id="ctNameUser"
                                value="<?php echo $user['nomadmin']; ?>" disabled>
                            <label for="ctSurNameUser">Apellidos</label>
                            <input type="text" name="ctSurNameUser" id="ctSurNameUser"
                                value="<?php echo $user['apeadmin']; ?>" disabled>
                            <label for="ctNameuser">Direccion</label>
                            <input type="text" name="ctAdrUser" id="ctAdrUser"
                                value="<?php echo $user['diradmin']; ?>" disabled>
                            <div>
                                <div>
                                    <label for="ctEmailUser">Correo Eletrónico</label>
                                    <input type="text" name="ctEmailUser" id="ctEmailUser"
                                        value="<?php echo $user['emaadmin']; ?>" disabled>
                                </div>
                                <div>
                                    <label for="ctNumCel">Numero de Celular 1</label>
                                    <input type="text" name="ctNumCel" id="ctNumCel"
                                        value="<?php echo $user['teladmin']; ?>" disabled>
                                </div>
                                <div>
                                    <label for="ctNumCel2">Numero de Celular 2</label>
                                    <input type="text" name="ctNumCel2" id="ctNumCel2"
                                        value="<?php echo $user['teladmin2']; ?>" disabled>
                                </div>
                            </div>
                            <div class="updatebutton">
                                <span id="enableForm1"> Editar</span>
                                <span id=""> Cancelar</span>
                            </div>
                            <input type="submit" name="guardarAdministrador" value="Guardar">

                        </form>

                    </div>
                </div>
                <div class="profile-adm container-right2" id="container-right2">
                    <div class="title">
                        <h1>proveedores</h1>
                    </div>
                    <div class="table-container">
                        <div class="form-container">
                            <form method="POST" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar Trabajador"
                                        name="buscar_trabajador">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Buscar</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table-container">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cedula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                            </tr>
                        </thead>
                        <?php foreach ($empleados as $empleado): ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?= $empleado->Idempleado ?>
                                    </td>
                                    <td>
                                        <?= $empleado->cedula ?>
                                    </td>
                                    <td>
                                        <?= $empleado->nombres ?>
                                    </td>
                                    <td>
                                        <?= $empleado->apellidos ?>
                                    </td>
                                    <td>
                                        <?= $empleado->telefono ?>
                                    </td>
                                    <td>
                                        <?= $empleado->direccion ?>
                                    </td>
                                    <td>
                                        <a href="editar.php?id=<?= $producto->idproducto ?>">
                                            <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="elimina.php?id=<?= $producto->idproducto ?>">
                                            <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach ?>
                    </table>

                </div>


                <div class="profile-adm container-right3" id="container-right3">
                    <div class="title">
                        <h1>empleados</h1>
                    </div>
                    <div class="table-container">
                        <div class="form-container">
                            <form method="POST" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar Trabajador"
                                        name="buscar_trabajador">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Buscar</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table-container">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cedula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                            </tr>
                        </thead>
                        <?php foreach ($empleados as $empleado): ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?= $empleado->Idempleado ?>
                                    </td>
                                    <td>
                                        <?= $empleado->cedula ?>
                                    </td>
                                    <td>
                                        <?= $empleado->nombres ?>
                                    </td>
                                    <td>
                                        <?= $empleado->apellidos ?>
                                    </td>
                                    <td>
                                        <?= $empleado->telefono ?>
                                    </td>
                                    <td>
                                        <?= $empleado->direccion ?>
                                    </td>
                                    <td>
                                        <a href="editar.php?id=<?= $producto->idproducto ?>">
                                            <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="elimina.php?id=<?= $producto->idproducto ?>">
                                            <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach ?>
                    </table>

                </div>
                <div class="profile-adm container-right4" id="container-right4">
                    <div class="title">
                        <h1>clientes</h1>
                    </div>
                    <div class="table-container">
                        <div class="form-container">
                            <form method="POST" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar cliente"
                                        name="buscar_cliente">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Buscar</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table-container">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Cedula</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                            </tr>
                        </thead>
                        <?php foreach ($clientes as $cliente): ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?= $cliente->Idcliente ?>
                                    </td>
                                    <td>
                                        <?= $cliente->cedula ?>
                                    </td>
                                    <td>
                                        <?= $cliente->nombres ?>
                                    </td>
                                    <td>
                                        <?= $cliente->apellidos ?>
                                    </td>
                                    <td>
                                        <?= $cliente->telefono ?>
                                    </td>
                                    <td>
                                        <?= $cliente->direccion ?>
                                    </td>
                                    <td>
                                        <a href="editar.php?id=<?= $producto->idproducto ?>">
                                            <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="elimina.php?id=<?= $producto->idproducto ?>">
                                            <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach ?>
                    </table>
                </div>
                <div class="profile-adm container-right5" id="container-right5">
                    <div class="title">
                        <h1>Mascotas</h1>
                    </div>
                    <div class="table-container">
                        <div class="form-container">
                            <form method="POST" action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Buscar mascota"
                                        name="buscar_mascota">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Buscar</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table-container">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Genero</th>
                                <th>Edad</th>
                                <th>Dueño</th>
                            </tr>
                        </thead>
                        <?php foreach ($mascotas as $mascota): ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <?= $mascota->Idmascota ?>
                                    </td>
                                    <td>
                                        <?= $mascota->dueño ?>
                                    </td>
                                    <td>
                                        <?= $mascota->nombre ?>
                                    </td>
                                    <td>
                                        <?= $mascota->genero ?>
                                    </td>
                                    <td>
                                        <?= $mascota->edad ?>
                                    </td>
                                    <td>
                                        <a href="editar.php?id=<?= $producto->idproducto ?>">
                                            <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="elimina.php?id=<?= $producto->idproducto ?>">
                                            <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<!-- Menu Profile -->
<script src="assets/Javascript/menu-profile-administrator.js"></script>
<!-- Calendar -->
<script src="assets/Javascript/calendar.js"></script>
<!-- Form Disable and Enable -->
<script src="assets/Javascript/form-disable-enable.js"></script>
<!--Font Awesome-->
<script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>