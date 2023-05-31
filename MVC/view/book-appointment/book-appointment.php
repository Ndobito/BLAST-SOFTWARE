
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
                        <h1>Citas</h1>
                        <p>Consulta nuestra disponibilidad y reserva la fecha y hora que más te convenga</p>

                        <div class="container-calendar">
                            <div class="slider-calendar" id="calendar-reserve1"></div> 
                            <div id="calendar-citas1"></div>
                        </div>

                        <button>Confirmar</button>
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
                        <p>Consulta nuestra disponibilidad y reserva la fecha y hora que más te convenga</p>

                        <div class="container-calendar">
                            <div class="slider-calendar" id="calendar-reserve2"></div> 
                            <div id="calendar-citas"></div>
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
        <footer>
            <div class="footer-top">
                <div class="footer-contain">
                    <h1>Siguenos en redes Sociales</h1>
                    <div>
                        <a href="#">
                            <i class="fa-brands fa-whatsapp"></i> Whatsapp
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <i class="fa-brands fa-instagram"></i> Instagram
                        </a>
                    </div>
                    <div>
                        <a href="#">
                            <i class="fa-brands fa-facebook"></i> Facebook
                        </a>
                    </div>
                </div>
                <div class="footer-contain">
                    <h1>Informacion de Contacto</h1>
                    <div>
                        <i class="fa-solid fa-tty"></i>
                        <p>111 111 1111</p>
                    </div>
                    <div>
                        <i class="fa-solid fa-envelope"></i>
                        <p>animal.world2023@gmail.com</p>
                    </div>
                    <div>
                        <i class="fa-solid fa-map-location-dot"></i>
                        <p>Carrera 23 A sur #10D-03 Barrio Puerto Gaitán</p>
                    </div>
                </div>
                <div class="footer-contain">
                    <h1>Horarios de Atencion</h1>
                    <p>
                        <br><br>
                        Lunes a Viernes: 8:00 am a 5:00 pm.
                        <br><br><br>
                        Sabado, Domingo y Festivos : 9:00 am
                        a 4:00 pm.
                    </p>
                </div>
                <div class="footer-contain">
                    <h1>Servicos Destacados</h1>
                    <p>
                        <br><br>
                        Consulta
                        <br><br>
                        Vacunacion
                        <br><br>
                        Radiografia
                        <br><br>
                        Laboratorio Clinico
                    </p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>
                    <img src="img/logo.jpg" alt="">
                    <i>@2023 Clinica Animal World | Veterinaria para mascotas en Colombia</i>
                    <br><br>
                </p>
                <p>
                    Sitio creado por
                    <img src="img/logo-removebg-blast-software.png" alt="Logo Blast Software"> 
                    <strong>BLast Software</strong>
                </p>
            </div>
        </footer>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
    <!-- Menu -->
    <script src="Javascript/menu.js"></script>
    <!-- Services -->
    <script src="Javascript/services.js"></script>
    <!-- Calendar -->
    <script src="Javascript/calendar-reserver.js"></script>
    <script>
        containerCalendar('calendar-reserve1');
        containerCalendar('calendar-reserve2');
        containerCalendar('calendar-reserve3');
        containerCalendar('calendar-reserve4');
    </script>
</body>
</html>