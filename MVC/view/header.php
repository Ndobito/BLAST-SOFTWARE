<body>
    <div class="container">
        <header>
            <div class="header-top">
                <div class="social-networks">
                    <a href="https://es-la.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://api.whatsapp.com/send?phone=3133215141"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
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
                            $tipoUsuario = isset($_REQUEST['p'])  ? $_REQUEST['p'] : "";

                            switch ($tipoUsuario) {
                                case "customer":
                                    $perfilURL = "?b=profile&Inicio&p=customer";
                                    break;
                                case "admin":
                                    $perfilURL = "?b=profile&Inicio&p=admin";
                                    break;
                                case "collaborator":
                                    $perfilURL = "?b=profile&Inicio&p=collaborator";
                                    break;
                                case "vet":
                                    $perfilURL = "?b=profile&Inicio&p=vet";
                                    break;
                                case "recepcionist":
                                    $perfilURL = "?b=profile&Inicio&p=recepcionist";
                                    break;
                                default:
                                    $perfilURL = ""; // Define una URL adecuada en caso de error
                                    break;
                            }

                            echo "<a href='?b=profile&s=Inicio&p=".$tipoUsuario."'><button><i class='fa-solid fa-user'></i>&nbsp;<span>" . $usuario . "</span></button></a>";
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
                    <a href="?b=index"><img src="assets/img/logo-removebg.png" alt=""></a>
                </div>
                <div class="nav">
                    <?php 
                    if ($_SESSION == true){
                        echo '<ul>';
                            echo "<a href='?b=index&s=Inicio&p=$tipoUsuario'><li>Inicio</li></a>";
                            echo "<a href='?b=knowus&s=Inicio&p=$tipoUsuario'><li>Conocenos</li></a>";
                            echo "<a href='?b=bookappointment&s=Inicio&p=$tipoUsuario'><li>Servicios y Reservas</li></a>";
                            echo "<a href='?b=contactus&s=Inicio&p=$tipoUsuario'><li>Contactenos</li></a>";
                        echo '</ul>';

                    }else if($_SESSION == false){
                        echo '<ul>';
                            echo '<a href="?b=index">
                                <li>Inicio</li>
                            </a>';
                            echo '<a href="?b=knowus">
                                <li>Conocenos</li>
                            </a>';
                            echo '<a href="?b=bookappointment">
                                <li>Servicios y Reservas</li>
                            </a>';
                            echo '<a href="?b=contactus">
                                <li>Contactenos</li>
                            </a>';

                        echo '</ul>';
                    };
                    
                    ?>
                </div>
                <div class="icon-menu">
                    <i id="open-menu" class="fa-solid fa-bars"></i>
                    <i id="close-menu" class="fa-solid fa-xmark"></i>
                </div>
            </div>
        </header>


