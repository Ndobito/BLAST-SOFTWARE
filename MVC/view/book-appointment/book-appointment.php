
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
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/7fa9974a48.js" crossorigin="anonymous"></script>
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