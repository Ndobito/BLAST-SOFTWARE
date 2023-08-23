
        <main>
            <div class="header-services">
                <h1>¡No podemos esperar a verte!</h1>
            </div>
            <div class="container-services">
                <div class="container-service">
                    <div>
                        <h1>Citas</h1>
                        <div class="circle-icon"><i class="fa-regular fa-calendar-check"></i></div>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus recusandae minus harum odit voluptatibus nobis odio eaque eos ex inventore suscipit, commodi accusamus esse magnam officiis error ipsa quasi! Assumenda.</p>
                    </div>
                    <div>
                        <button onclick="formService()">Agendar Cita</button>
                    </div>
                </div>
                <div class="container-service">
                    <div>
                        <h1>Citas</h1>
                        <div class="circle-icon"><i class="fa-regular fa-calendar-check"></i></div>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus recusandae minus harum odit voluptatibus nobis odio eaque eos ex inventore suscipit, commodi accusamus esse magnam officiis error ipsa quasi! Assumenda.</p>
                    </div>
                    <div>
                        <button onclick="formService()">Agendar Cita</button>
                    </div>
                </div>
                <div class="container-service">
                    <div>
                        <h1>Citas</h1>
                        <div class="circle-icon"><i class="fa-regular fa-calendar-check"></i></div>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus recusandae minus harum odit voluptatibus nobis odio eaque eos ex inventore suscipit, commodi accusamus esse magnam officiis error ipsa quasi! Assumenda.</p>
                    </div>
                    <div>
                        <button onclick="formService()">Agendar Cita</button>
                    </div>
                </div>
                <div class="container-service">
                    <div>
                        <h1>Citas</h1>
                        <div class="circle-icon"><i class="fa-regular fa-calendar-check"></i></div>
                    </div>
                    <div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus recusandae minus harum odit voluptatibus nobis odio eaque eos ex inventore suscipit, commodi accusamus esse magnam officiis error ipsa quasi! Assumenda.</p>
                    </div>
                    <div>
                        <button onclick="formService()">Agendar Cita</button>
                    </div>
                </div>
            </div>
        </main>
        <div class="formService">
            <i class="fa-solid fa-xmark"></i>
            <h1>Agendamiento de Servicios</h1>
            <div class="form">
                <p>Recuerde que para solicitar los servicios debe encontrase registrado y tener mascotas registradas</p>
                <form action="#" method="post">
                    <div>
                        <h2>Datos de Usuario</h2>
                        
                        <div class="input-container">
                            <label class="tex">Numero de documento</label>    
                            <input type="number" name="numid" class="input" autocomplete="off">
                            <span>Numero de documento &nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <div class="input-container">
                            <label class="tex">Nombre</label>
                            <input type="text" name="addres" class="input" autocomplete="off">
                            <span>Direccion</span>
                        </div>
                        <div class="input-container">
                            <label class="tex">Direccion</label>
                            <input type="text" name="addres" class="input" autocomplete="off">
                            <span>Direccion</span>
                        </div>
                        <div class="input-container">
                            <label class="tex">Numero de Telefono</label>
                            <input type="number" name="phone" class="input" autocomplete="off">
                            <span>Numero de Telefono&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <div class="input-container">
                            <label class="tex">Email</label>
                            <input type="email" name="email" class="input" autocomplete="off">
                            <span>Email </span>
                        </div>
                    </div>
                    <div>
                        <h2>Datos de Mascota</h2>
                        <div class="input-container">
                            <label class="tex" for="">Nombre </label>
                            <input type="text" name="namepet" class="input">
                            <span>Nombre</span>
                        </div>
                        <div class="input-container">
                            <label for="">Genero </label>
                            <select name="genpet" class="input">
                                <option selected disabled>Seleccione una opcion</option>    
                                <option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select>
                            <span>Genero</span>
                        </div>
                        <div class="input-container">
                            <label class="tex">Especie</label>
                            <select name="esppet" class="input">
                                <option selected disabled>Seleccione una opcion</option>
                                <option value="canino">Canino</option>
                                <option value="felino">Felino</option>
                                <option value="equino">Equino</option>
                                <option value="bovino">Bovino</option>
                                <option value="porcino">Porcino</option>
                                <option value="ave">Ave</option>
                                <option value="otro">Otro...</option>
                            </select>
                            <span>Especie</span>
                        </div>
                        <div class="input-container">
                            <label>Motivo de solicitud</label>
                            <textarea name="motive" class="input" cols="40" rows="3"></textarea>
                            <span>Motivo de solicitud&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                    </div>
                        
                    
                </fo>
        </div>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
    <!-- Menu -->
    <script src="assets/Javascript/menu.js"></script>
    <!-- Form Services -->
    <script src="assets/Javascript/services.js"></script>
    <!-- Form Inputs -->
    <script src="assets/Javascript/edit-and-save.js"></script>
</body>
</html>