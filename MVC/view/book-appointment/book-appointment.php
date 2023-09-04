
        <main>
            <div class="header-services">
                <h1>¡No podemos esperar a verte!</h1>
            </div>
            <div class="container-services">
                <div class="cont-service citas">
                    <div class="service">
                        <h1>Citas</h1>
                        <p>1h <br> $10.000</p>
                        <button onclick="reserver(1)">Reservar</button>
                    </div>
                    <div class="reserve" id="reserve-citas">
                        <i class="fa-solid fa-xmark" onclick="exit(1)"></i>
                      
                         <div class="container-calendar">
                                <h1>Agenda Tu Cita Ya</h1>
                                <form action="?b=bookappointment&s=AgendarCita" method="post">
                                    <div class="container-input">
                                    <label for="nombre">Nombre:</label>
                                    <input type="text" id="nombre" name="nombre" required>
                                    </div>

                                    <div class="container-input">
                                    <label for="idcliente">Dni User :</label>
                                   <input type="text" id="dniuser" name="dniuser" required>
                                    </div>
                                    
                                    <div class="container-input">
                                    <label for="fecha">Fecha:</label>
                                    <input type="date" id="fecha" name="fecha" required>
                                    </div>
                                    
                                    <div class="container-input">
                                    <label for="hora">Hora:</label>
                                    <input type="time" id="hora" name="hora" required max="<?php echo date('H:i', strtotime('+1 hour')); ?>">
                                    <option value="">Selecciona una hora</option>
                                        <?php foreach ($horasPosibles as $horaPosible) { ?>
                                            <?php if (in_array($horaPosible, $horasDisponibles)) { ?>
                                                <option value="<?php echo $horaPosible; ?>"><?php echo $horaPosible; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                   </div>
                                    
                                    <div class="container-input">
                                    <label for="telefono">Teléfono:</label>
                                    <input type="tel" id="telefono" name="telefono" required>
                                    </div>
                                    
                                    <div class="container-input">
                                    <label for="email">Correo electrónico:</label>
                                    <input type="email" id="email" name="email" required>
                                    </div>
                                    
                                    <div class="container-input">
                                    <label for="nommascota">Nombre de la mascota:</label>
                                    <input type="text" id="nommascota" name="nommascota" required>
                                    </div>
                                    
                                    <div class="container-input">
                                    <label for="especie">Especie:</label>
                                    <select name="especie" id="especie">
                                        <option value="canino">Canino</option>
                                        <option value="felino">Felino</option>
                                        <option value="roedor">Roedor</option>
                                    </select>
                                    </div>
                                    
                                    <div class="container-input">
                                    <label for="genero">Género:</label>
                                    <select name="genero" id="genero" >
                                        <option value="hembra"> Hembra</option>
                                        <option value="Macho"> Macho</option>
                                    </select>
                                    </div>
                                    
                                    <div class="container-input">
                                    <label for="motivo">Motivo de la cita:</label>
                                    <textarea id="motivo" name="motivo" required></textarea>
                                    </div>
                                    
                                    <div class="container-input">
                                    <label for="observacion">Observaciones:</label>
                                    <textarea id="observacion" name="observacion"></textarea>
                                    </div>

                                   <div class="container-input">
                                    <label for="nomdoctor">Nombre Del Veterinario</label>
                                    <select name="asicita" id="asicita">
                                        <option value="Alejandro">Alejandro </option>
                                        <option value="Ronaldo">Ronaldo </option>
                                        <option value="Arturo">Arturo </option>
                                        <option value="karol">Karol </option>
                                        <option value="JuamPis">JuamPis </option>
                                    </select>
                                   </div>
                                    
                                    <input type="submit" value="Agendar Cita">
                                </form>
                            </div>


                </div>
                <div class="cont-service">
                    <div class="service">
                        <h1>Cirugia</h1>
                        <p>1h <br> $10.000</p>
                        <button onclick="reserver(2)">Reservar</button>
                    </div>
                    <div class="reserve" id="reserve-surgeries">
                        <i class="fa-solid fa-xmark" onclick="exit(2)"></i>
                        <h1>Cirugia</h1>
                      
                        
                        <div class="container-calendar">
                                <h1>Agenda Tu Cita Ya</h1>
                        </div>
                        <button>Confirmar</button>

                    </div>
                </div>
                <div class="cont-service">
                    <div class="service">
                        <h1>Laboratorio Clinico</h1>
                        <p>1h <br> $10.000</p>
                        <button onclick="reserver(3)">Reservar</button>
                    </div>
                    <div class="reserve" id="reserve-lab">
                        <i class="fa-solid fa-xmark" onclick="exit(3)"></i>
                        <h1>Laboratorio Clinico</h1>
                        <p>Consulta nuestra disponibilidad y reserva la fecha y hora que más te convenga</p>

                        <div class="container-calendar">
                            <div class="slider-calendar" id="calendar-reserve3"></div> 
                            <div id="calendar-citas"></div>
                        </div>

                        <button>Confirmar</button>

                    </div>
                </div>
                <div class="cont-service">
                    <div class="service">
                        <h1>Radiografias</h1>
                        <p>1h <br> $10.000</p>
                        <button onclick="reserver(4)">Reservar</button>
                    </div>
                    <div class="reserve" id="reserve-xrays">
                        <i class="fa-solid fa-xmark" onclick="exit(4)"></i>
                        <h1>Radiografias</h1>
                        <p>Consulta nuestra disponibilidad y reserva la fecha y hora que más te convenga</p>

                        <div class="container-calendar">
                            <div class="slider-calendar" id="calendar-reserve4"></div> 
                            <div id="calendar-citas"></div>
                        </div>

                        <button>Confirmar</button>

                    </div>
                </div>
            </div>
        </main>
    </div>
<!-- 
    Font Awesome -->
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
    <!-- bookappointment  -->
    <script src="assets/Javascript/bookappontment.js"></script>
    <!-- Menu -->
    <script src="assets/Javascript/menu.js"></script>
    <!-- Services -->
     <script src="assets/Javascript/services.js"></script> 
    <!-- Calendar -->
    <script src="assets/Javascript/calendar-reserver.js"></script>
    <script>
        containerCalendar('calendar-reserve1');
        containerCalendar('calendar-reserve2');
        containerCalendar('calendar-reserve3');
        containerCalendar('calendar-reserve4');
    </script>
</body>
</html>