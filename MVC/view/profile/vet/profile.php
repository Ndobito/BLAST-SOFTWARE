<div class="container">>
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
                            <?php echo $nombreUsuario; ?>
                        </h1>
                        <h1>Veterinario</h1>
                    </div>
                    <div class="menu">
                        <div id="btns-menu">
                            <button class="profile-vet-btn">INFORMACION</button>
                        </div>
                        <div>
                            <button class="profile-vet-btn">CITAS</button>
                        </div>
                        <div>
                            <button class="profile-vet-btn">CLIENTES</button>
                        </div>
                        <div>
                            <button class="profile-vet-btn">MASCOTAS</button>
                        </div>
                        <div>
                            <a href="?b=profile&s=cerrarSesion"><button><i
                                        class="fa-solid fa-right-from-bracket fa-rotate-180"></i> SALIR </button></a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="right">
                <div class="profile-vet container-right" id="container-right">
                    <div class="user-information">
                        <h1>Datos</h1>
                        <form id="form-user-information" action="#" method="post">
                            <label for="ctNameuser">Nombres</label>
                            <input type="text" name="ctNameUser" id="ctNameUser" disabled>
                            <label for="ctSurNameUser">Apellidos</label>
                            <input type="text" name="ctSurNameUser" id="ctSurNameUser" disabled>
                            <label for="ctNameuser">Direccion</label>
                            <input type="text" name="ctAdrUser" id="ctAdrUser" disabled>
                            <label for="selZoneResid">Zona de Residencia</label>
                            <select name="selZoneResid" id="selZoneResid" disabled>
                                <option value="urbano">Urbano</option>
                                <option value="rural">Rural</option>
                            </select>
                            <div>
                                <div>
                                    <label for="ctEmailUser">Correo Eletrónico</label>
                                    <input type="text" name="ctEmailUser" id="ctEmailUser" disabled>
                                </div>
                                <div>
                                    <label for="ctEmailUser2">Confirmacion de Correo electronico:</label>
                                    <input type="text" name="ctEmailUser" id="ctEmailUser" disabled>
                                </div>
                                <div>
                                    <label for="ctNumCel">Numero de Celular 1</label>
                                    <input type="text" name="ctNumCel" id="ctNumCel" disabled>
                                </div>
                                <div>
                                    <label for="ctNumCel2">Numero de Celular 2</label>
                                    <input type="text" name="ctNumCel2" id="ctNumCel2" disabled>
                                </div>
                            </div>
                            <input type="submit" id="disableForm1" value="Guardar" disabled>
                        </form>
                        <button id="enableForm1">Editar</button>
                    </div>
                </div>
                <div class="profile-vet container-right2" id="container-right2">
                    <div class="slider-calendar" id="calendar"></div>
                    <div id="calendar-citas"></div>
                </div>
                <div class="profile-vet container-right3" id="container-right3">
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
                                </tr>
                            </tbody>
                        <?php endforeach ?>
                    </table>
                    <div class="edit">
                        <a href="<?= $cliente->Idclienteo ?>">Editar</a>
                    </div>
                </div>
                <div class="profile-vet container-right4" id="container-right4">
                    <div class="title">
                        <h1>Mascota</h1>
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

                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Telefono</th>
                                <th>Nom-Nascota</th>
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
                                        <?= $cliente->nombres ?>
                                    </td>
                                    <td>
                                        <?= $cliente->apellidos ?>
                                    </td>
                                    <td>
                                        <?= $cliente->telefono ?>
                                    </td>
                                    <td>
                                        <?= $cliente->NomMascota ?>
                                    </td>
                                    <td>
                                        <?= $cliente->direccion ?>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach ?>
                    </table>
                    <div class="edit">
                        <a href="#">Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<!-- Menu Profile -->
<script src="Javascript/menu-profile-veterinario.js"></script>
<!-- Calendar -->
<script src="Javascript/calendar.js"></script>
<!-- Form Disable and Enable -->
<script src="Javascript/form-disable-enable.js"></script>
<!--Font Awesome-->
<script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>