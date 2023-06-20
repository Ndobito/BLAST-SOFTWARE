<body>
    <div class="container">
        <header>
            <div class="header-top">
                <div class="social-networks">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                </div>
                <div class="search-bar">
                    <div>
                        <form action="#" method="post">
                            <input type="search" name="ctSearch" id="ctSearch" placeholder="¿Que deseas buscar hoy?">
                            <i type="submit" id="icon-search" class="fa-solid fa-magnifying-glass"></i>
                        </form>
                    </div>
                </div>
                <div class="button-register">
                    <div class="button-register">
                        <?php
                        if (isset($_SESSION['usuario'])) {
                            // Si la sesión está iniciada, mostrar el nombre del usuario y redirigir al perfil correspondiente
                            $usuario = $_SESSION['usuario'];
                            $tipoUsuario = $_SESSION['tipoUsuario'];

                            switch ($tipoUsuario) {
                                case "cliente":
                                    $perfilURL = "?b=profile";
                                    break;
                                case "administrador":
                                    $perfilURL = "?b=profileadministrador";
                                    break;
                                case "colaborador":
                                    $perfilURL = "?b=colaborador";
                                    break;
                                default:
                                    $perfilURL = ""; // Define una URL adecuada en caso de error
                                    break;
                            }

                            echo '<a href="' . $perfilURL . '"><button><i class="fa-solid fa-user"></i>&nbsp;<span>' . $usuario . '</span></button></a>';
                        } else {
                            // Si la sesión no está iniciada, mostrar el botón de iniciar sesión
                            echo '<a href="?b=login"><button><i class="fa-solid fa-user"></i>&nbsp;<span>Iniciar Sesión</span></button></a>';
                        }
                        ?>
                    </div>

                </div>
            </div>
            <div class="header-bottom">
                <div class="container-logo">
                    <img src="assets/img/logo-removebg.png" alt="">
                </div>
                <div class="nav">
                    <ul>
                        <a href="?b=index">
                            <li>Inicio</li>
                        </a>
                        <a href="?b=knowus">
                            <li>Conocenos</li>
                        </a>
                        <a href="?b=bookappointment">
                            <li>Servicios</li>
                        </a>
                        <a href="?b=contactus">
                            <li>Contactenos</li>
                        </a>
                        <a href="?b=bookappointment">
                            <li>Reservas</li>
                        </a>
                    </ul>
                </div>
                <div class="icon-menu">
                    <i id="open-menu" class="fa-solid fa-bars"></i>
                    <i id="close-menu" class="fa-solid fa-xmark"></i>
                </div>
            </div>
        </header>
        <div id="panel-menu" class="content-menu">
            <ul>
                <a href="?b=index&s=Inicio">
                    <li>Inicio</li>
                </a>
                <a href="?b=knowus">
                    <li>Conocenos</li>
                </a>
                <a href="?b=bookappointment">
                    <li>Servicios</li>
                </a>
                <a href="?b=contactus">
                    <li>Contactenos</li>
                </a>
                <a href="?b=bookappointment">
                    <li>Reservas</li>
                </a>
            </ul>
        </div>