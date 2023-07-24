<div class="container">
    <div class="returm">
        <a href="?b=index&s=Inicio&p=admin"><i class="fa-solid fa-arrow-left"></i></a>
    </div> <!-- Body of the work -->
    <main>
        <div class="container-main-profile">
            <div class="left">
                <div class="container-menu">
                    <div class="user">
                        <div class="img"></div>
                        <h1>
                            <?php echo $user['nomadmin'] . " " . $user['apeadmin']; ?>
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
                        <form id="form-user-information" action="?b=profile&s=actualizarUsuario" method="post">
                            <input name="ctIdUser" type="hidden" value="<?php echo $user['idadmin'] ?>">
                            <label for="ctNameUser">Nombres*</label>
                            <input type="text" name="ctNameUser" id="ctNameUser"
                                value="<?php echo $user['nomadmin'] ?? "Sin definir"; ?>" disabled>
                            <label for="ctSurNameUser">Apellidos *</label>
                            <input type="text" name="ctSurNameUser" id="ctSurNameUser"
                                value="<?php echo $user['apeadmin'] ?? "Sin definir"; ?>" disabled>
                            <label for="ctNameuser">Nickname: *</label>
                            <input type="text" name="ctNickUser" id="ctNickUser"
                                value="<?php echo $user['nickadmin']; ?>" disabled>
                            <label for="ctNameuser">Direccion *</label>
                            <input type="text" name="ctAdrUser" id="ctAdrUser" value="<?php echo $user['diradmin']; ?>"
                                disabled>
                            <div>
                                <div>
                                    <label for="ctEmailUser">Correo Eletrónico *</label>
                                    <input type="text" name="ctEmailUser" id="ctEmailUser"
                                        value="<?php echo $user['emaadmin']; ?>" disabled>
                                </div>
                                <div>
                                    <label for="ctNumCelUser">Numero de Celular 1 *</label>
                                    <input type="text" name="ctNumCelUser" id="ctNumCelUser"
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
                            </div>
                            <input type="submit" name="btnUpdateProfile" value="Guardar">
                        </form>
                    </div>
                </div>
                <div class="profile-adm container-right2" id="container-right2">
                    <div class="title">
                        <h1>proveedores</h1>
                    </div>
                    <div class="table-container">
                        <div class="form-container">
                            <div class="input-group">
                                <a href="?b=profile&s=Agregar"><button class="btn btn-default" type="submit">Agregar</button></a>
                            </div>
                            <form method="GET" action="?b=profile&s=Inicio&p=admin" id="search-form">
                                <div class="input-group">
                                    <input type="text" id="searchprov" class="form-control"
                                        placeholder="Buscar Proveedor" name="buscar_proveedor">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">Buscar</button>
                                    </span>
                                </div>

                            </form>
                        </div>
                        <div id="search-results">
                            <table class="table-container">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombres</th>
                                        <th>Direccion</th>
                                        <th>Email</th>
                                        <th>Telefono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($proveedores as $proveedor) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $proveedor['idprov'] ?? "Sin definir"; ?>
                                        </td>
                                        <td>
                                            <?php echo $proveedor['nomprov'] ?? "Sin definir"; ?>
                                        </td>
                                        <td>
                                            <?php echo $proveedor['dirprov'] ?? "Sin definir"; ?>
                                        </td>
                                        <td>
                                            <?php echo $proveedor['emaprov'] ?? "Sin definir"; ?>
                                        </td>
                                        <td>
                                            <?php echo $proveedor['telprov'] ?? "Sin definir"; ?>
                                        </td>
                                        <td class="icons1">
                                            <a  href="?b=profile&s=EditarInfoProv&idprod=<?= $proveedor['idprov']; ?>">
                                                <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                        <td class="icons2">
                                            <a href="#">
                                                <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <table class="table-container">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($proveedores as $proveedor) { ?>
                            <tr>
                                <td>
                                    <?php echo $proveedor['idprov']; ?>
                                </td>
                                <td>
                                    <?php echo $proveedor['nomprov'] ?? "Sin definir"; ?>
                                </td>
                                <td>
                                    <?php echo $proveedor['apeprov'] ?? "Sin definir"; ?>
                                </td>
                                <td>
                                    <?php echo $proveedor['telprov'] ?? "Sin definir"; ?>
                                </td>
                                <td>
                                    <?php echo $proveedor['dirprov'] ?? "Sin definir"; ?>
                                </td>
                                <td class="icons1">
                                    <a href="?b=profile&s=EditarInfo" id="Prveedor">
                                        <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td class="icons2">
                                    <a href="#">
                                        <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="profile-adm container-right3" id="container-right3">
                    <div class="title">
                        <h1>empleados</h1>
                    </div>
                    <div class="table-container">
                        <div class="form-container">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a href=""><button class="btn btn-default" type="submit">Agregar</button></a>
                                </span>
                            </div>
                            <form method="POST" action="?b=profile&s=buscador">
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
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($empleado as $colaborador) { ?>
                            <tr>
                                <td>
                                    <?php echo $colaborador['idcol']; ?>
                                </td>
                                <td>
                                    <?php echo $colaborador['dnicol']; ?>
                                </td>
                                <td>
                                    <?php echo $colaborador['nomcol']; ?>
                                </td>
                                <td>
                                    <?php echo $colaborador['emacol']; ?>
                                </td>
                                <td>
                                    <?php echo $colaborador['dircol']; ?>
                                </td>
                                <td>
                                    <?php echo $colaborador['telcol']; ?>
                                </td>
                                <td>
                                    <?php echo $colaborador['rolcol']; ?>
                                </td>
                                <td class="icons1">
                                    <a href="?b=profile&s=EditarInfoemp&idcola=<?= $colaborador['idcol']; ?>">
                                        <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td class="icons2">
                                    <a href="#">
                                        <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="profile-adm container-right4" id="container-right4">
                    <div class="title">
                        <h1>clientes</h1>
                    </div>
                    <div class="table-container">
                        <div class="form-container">
                            <form method="POST" action="?b=profile&s=buscarClientes">
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
                                <th>Nombre</th>
                                <th>EMAIL</th>
                                <th>USUARIO</th>
                                <th>Direccion</th>
                                <th>ZONA</th>
                                <th>Telefono</th>
                            </tr>
                        </thead>
                        <?php foreach ($cliente as $cliente) { ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $cliente['idcli']; ?>
                                </td>
                                <td>
                                    <?php echo $cliente['nomcli']; ?>
                                </td>
                                <td>
                                    <?php echo $cliente['emacli']; ?>
                                </td>
                                <td>
                                    <?php echo $cliente['usercli']; ?>
                                </td>
                                <td>
                                    <?php echo $cliente['dircli']; ?>
                                </td>
                                <td>
                                    <?php echo $cliente['tzonecli']; ?>
                                </td>
                                <td>
                                    <?php echo $cliente['telcli']; ?>
                                </td>
                                <td class="icons1">
                                    <a href="#">
                                        <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td class="icons2">
                                    <a href="#">
                                        <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
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
                                <th>Edad</th>
                                <th>Genero</th>
                                <th>ESPECIE</th>
                                <th>Dueño ID</th>
                            </tr>
                        </thead>
                        <?php foreach ($mascota as $mascota) { ?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $mascota['idmas']; ?>
                                </td>
                                <td>
                                    <?php echo $mascota['nommas']; ?>
                                </td>
                                <td>
                                    <?php echo $mascota['edadmas']; ?>
                                </td>
                                <td>
                                    <?php echo $mascota['genmas']; ?>
                                </td>
                                <td>
                                    <?php echo $mascota['espmas']; ?>
                                </td>
                                <td>
                                    <?php echo $mascota['idcli']; ?>
                                </td>
                                <td class="icons1">
                                    <a href="#">
                                        <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td class="icons2">
                                    <a href="#">
                                        <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-bottom">
            <p>
                <img src="assets/img/logo.jpg" alt="">
                <i>@2023 Clinica Animal World | Veterinaria para mascotas en Colombia</i>
                <br><br>
            </p>
            <p>
                Sitio creado por
                <img src="assets/img/logo-removebg-blast-software.png" alt="Logo Blast Software" title="Blast Software">
                <strong>BLast Software</strong>
            </p>
        </div>
    </footer>
</div>

<!-- Menu Profile -->
<script src="assets/Javascript/menu-profile-administrator.js"></script>
<!-- Calendar -->
<script src="assets/Javascript/calendar.js"></script>
<!-- Form Disable and Enable -->
<script src="assets/Javascript/form-disable-enable.js"></script>
<!--Font Awesome-->
<script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>