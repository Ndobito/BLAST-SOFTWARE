<?php
include_once "model/Profile.php";
include_once 'lib/privilegios.php';

class ProfileController
{
    private $object;
    public function __construct()
    {
        $this->object = new Profile();
    }

    //-----Metodo para redireccionar segun el rol de inicio de sesión-----//
    public function Inicio($rol)
    {
        // var_dump(Privilegios::Admin->get(), $_SESSION["privilegios"]);
        // if ((Privilegios::Admin->get() & $_SESSION["privilegios"]) != Privilegios::Admin->get()) {
        //     redirect("?")->error("No tiene permisos")->send();
        // }

        $style = "<link rel='stylesheet' href='assets/css/style-$rol.css'>";
        require_once "view/head.php";
        $proveedores = $this->object->getProveedores();
        $empleado = $this->object->getEmpleado();
        $cliente = $this->object->getCliente();
        $mascota = $this->object->getMascota();
        $usuario = $_SESSION['usuario'];
        $proveedores = $this->object->getProveedores();
        switch ($rol) {
            case 'admin':
                $name = $_SESSION['usuario'];
                $user = $this->object->selectUser($usuario);
                $data = compact('user');
                break;
            case 'customer':
                $usuario = $this->object->selectUser($usuario);
                $data = compact('persona');
                break;
            case 'recepcionist':
                $administrador = $this->object->selectUser($usuario);
                $data = compact('persona');
                break;
            case 'collaborator':
                $administrador = $this->object->selectUser($usuario);
                $data = compact('persona');
                break;
            case 'vet':
                $administrador = $this->object->selectUser($usuario);
                $data = compact('persona');
                break;
            default:
                echo "Rol indefinido";
                break;
        }
        require_once "view/profile/" . $rol . "/profile.php";
        require_once "view/footerprofile.php";
    }

    // -----Metodo para redireccionar a vista de Editar Proveedor y Colaborador -----//
    public function optionEditRedirec()
    {
        $o = $_REQUEST['p'];
        switch ($o) {
            case 'proveedor':
                if ($_GET['idprov']) {
                    $table = "proveedor";
                    $param = "idprov";
                    $idProveedor = $_GET['idprov'];
                    $proveedor = $this->object->existProfile($table, $param, $idProveedor);
                    $style = "<link rel='stylesheet' type='text/css' href='assets/css/style-editarInfo.css'>";
                    require_once "view/head.php";
                    require_once "view/profile/admin/edit/editar-proveedor.php";
                }
                break;
            case 'colaborador':
                if ($_GET['idcola']) {
                    $table = "colaborador";
                    $param = "idcol";
                    $idColaborador = $_GET['idcola']; 
                    $colaborador = $this->object->existProfile($table, $param, $idColaborador);
                    $style = "<link rel='stylesheet' type='text/css' href='assets/css/style-editarInfo.css'>";
                    require_once "view/head.php";
                    require_once "view/profile/admin/edit/editar-colaborador.php";
                }
                break;
            case 'cliente':
                    if ($_GET['idcli']) {
                        $table = "cliente"; 
                        $param = "numid";
                        $idCliente = $_GET['idcli'];
                        $cliente = $this->object->existProfile($table, $param, $idCliente);
                        $style = "<link rel='stylesheet' type='text/css' href='assets/css/style-editarInfo.css'>";
                        require_once "view/head.php";
                        require_once "view/profile/admin/edit/editar-cliente.php";
                    }
                    break;
            case 'mascota':
                        if ($_GET['idmas']) {
                            $table = "mascota";
                            $param = "idmas"; 
                            $idMascota = $_GET['idmas'];
                            $mascota = $this->object->existProfile($table, $param, $idMascota);
                            $style = "<link rel='stylesheet' type='text/css' href='assets/css/style-editarInfo.css'>";
                            require_once "view/head.php";
                            require_once "view/profile/admin/edit/editar-mascota.php";
                        }
                        break;
            default:
                redirect("?b=profile&s=Inicio&p=admin")->error("Pagina no encontrada")->send();
                break;
        }
    }

    // -----Metodo para redireccionar a vista de agregar Proveedor y Colaborador -----//
    public function optionSaveRedirec()
    {
        $o = $_REQUEST['p'];
        switch ($o) {
            case 'proveedor':
                $style = "<link rel='stylesheet' type='text/css' href='assets/css/style-editarInfo.css'>";
                require_once "view/head.php";
                require_once "view/profile/admin/save/agregar-proveedor.php";
                break;
            case 'colaborador':
                $style = "<link rel='stylesheet' type='text/css' href='assets/css/style-editarInfo.css'>";
                require_once "view/head.php";
                require_once "view/profile/admin/save/agregar-colaborador.php";
                break;
            default:
                redirect("?b=profile&s=Inicio&p=admin")->error("Pagina no encontrada")->send();
                break;
        }
    }

    // -----Metodo oara mostrar los resultados del buscador de Proveedor------ //
    public function buscarProveedor()
    {
        $searchTerm = $_POST['buscar_proveedor'];
        $proveedores = $this->object->getProveedores();

        $filteredProveedores = array_filter($proveedores, function ($proveedor) use ($searchTerm) {
            return (stripos($proveedor['idprov'], $searchTerm) !== false) ||
                (stripos($proveedor['nomprov'], $searchTerm) !== false);
        });

        foreach ($filteredProveedores as $proveedor) {
            echo '<tr>';
            echo '<td>' . $proveedor['idprov'] . '</td>';
            echo '<td>' . ($proveedor['nomprov'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($proveedor['dirprov'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($proveedor['emaprov'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($proveedor['telprov'] ?? "Sin definir") . '</td>';
            echo '<td class="icons1"><a href="?b=profile&s=optionEditRedirec&p=mascota&idmas=<?= $mascota["idmas"]; ?>"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a></td>';
            echo '<td class="icons2"><a href="#"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a></td>';
            echo '</tr>';
        }
    }

    // -----Metodo oara mostrar los resultados del buscador de Colaborador------ //
    public function buscarColaborador()
    {
        $searchTerm = $_POST['buscar_empleado'];
        $empleados = $this->object->getEmpleado();

        $filteredEmpleados = array_filter($empleados, function ($empleado) use ($searchTerm) {
            return (stripos($empleado['idcol'], $searchTerm) !== false) ||
                (stripos($empleado['dnicol'], $searchTerm) !== false) ||
                (stripos($empleado['nomcol'], $searchTerm) !== false) ||
                (stripos($empleado['rolcol'], $searchTerm) !== false);
        });

        foreach ($filteredEmpleados as $empleado) {
            echo '<tr>';
            echo '<td>' . $empleado['idcol'] . '</td>';
            echo '<td>' . ($empleado['dnicol'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($empleado['nomcol'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($empleado['emacol'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($empleado['dircol'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($empleado['telcol'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($empleado['rolcol'] ?? "Sin definir") . '</td>';
            echo '<td class="icons1"><a href="#"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a></td>';
            echo '<td class="icons2"><a href="#"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a></td>';
            echo '</tr>';
        }
    }

    // -----Metodo para mostrar los resultados del buscador de Clientes------ //
    public function buscarClientes()
    {
        $searchTerm = $_POST['buscar_cliente'];
        $clientes = $this->object->getCliente();

        $filteredcliente = array_filter($clientes, function ($cliente) use ($searchTerm) {
            return (stripos($cliente['idcli'], $searchTerm) !== false) ||
                (stripos($cliente['nomcli'], $searchTerm) !== false) ||
                (stripos($cliente['emacli'], $searchTerm) !== false) ||
                (stripos($cliente['usercli'], $searchTerm) !== false);
        });

        foreach ($filteredcliente as $cliente) {
            echo '<tr>';
            echo '<td>' . $cliente['idcli'] . '</td>';
            echo '<td>' . ($cliente['nomcli'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($cliente['emacli'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($cliente['usercli'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($cliente['dircli'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($cliente['tzonecli'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($cliente['telcli'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($cliente['telaltcli'] ?? "Sin definir") . '</td>';
            echo '<td class="icons1"><a href="#"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a></td>';
            echo '<td class="icons2"><a href="#"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a></td>';
            echo '</tr>';
        }
    }

    // -----Metodo oara mostrar los resultados del buscador de Mascotas------ //
    public function buscarMascotas()
    {
        $searchTerm = $_POST['buscar_mascota'];
        $mascotas = $this->object->getMascota();

        $filteredmascota = array_filter($mascotas, function ($mascota) use ($searchTerm) {
            return (stripos($mascota['idmas'], $searchTerm) !== false) ||
                (stripos($mascota['nommas'], $searchTerm) !== false) ||
                (stripos($mascota['edadmas'], $searchTerm) !== false) ||
                (stripos($mascota['genmas'], $searchTerm) !== false) ||
                (stripos($mascota['idcli'], $searchTerm) !== false);
        });

        foreach ($filteredmascota as $mascota) {
            echo '<tr>';
            echo '<td>' . $mascota['idmas'] . '</td>';
            echo '<td>' . ($mascota['nommas'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($mascota['edadmas'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($mascota['genmas'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($mascota['espmas'] ?? "Sin definir") . '</td>';
            echo '<td>' . ($mascota['idcli'] ?? "Sin definir") . '</td>';
            echo '<td class="icons1"><a href="#"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a></td>';
            echo '<td class="icons2"><a href="#"><i class="fa-solid fa-trash-can" aria-hidden="true"></i></a></td>';
            echo '</tr>';
        }
    }

    // -----Metodo para guardar la informacion de Colaboradores y Proveedores----- //
    public function saveProfile()
    {
        $rol = $_REQUEST['p'];
        switch ($rol) {
            case 'proveedor':
                if (empty($_POST['ctNomProv']) || empty($_POST['ctDirProv']) || empty($_POST['ctEmaProv']) || empty($_POST['ctTelProv'])) {
                    redirect("?b=profile&s=optionSaveRedirec&p=proveedor")->error("Se deben llenar todos los campos")->send();
                } else {
                    if ($this->object->verifyNumberString($_POST['ctNomProv'])) {
                        redirect("?b=profile&s=optionSaveRedirec&p=proveedor")->error("El nombre no puede llevar numeros")->send();
                    } else {
                        if (!$this->object->verifyEmailString($_POST['ctEmaProv'])) {
                            redirect("?b=profile&s=optionSaveRedirec&p=proveedor")->error("Formato de correo electronico invalido")->send();
                        } else {
                            if ($this->object->verifyLeterString($_POST['ctTelProv'])) {
                                redirect("?b=profile&s=optionSaveRedirec&p=proveedor")->error("El numero de telefono no puede llevar letras")->send();
                            } else {
                                $name = $_POST['ctNomProv'];
                                $dir = $_POST['ctDirProv'];
                                $ema = $_POST['ctEmaProv'];
                                $tel = $_POST['ctTelProv'];

                                if ($this->object->saveProveedor($name, $dir, $ema, $tel)) {
                                    redirect("?b=profile&s=Inicio&p=admin")->success("Se ha agregado el proveedor correctamente")->send();
                                } else {
                                    redirect("?b=profile&s=Inicio&p=admin")->error("Error al crear el usuario")->send();
                                }
                            }
                        }
                    }
                }
                break;
            case 'colaborador':
                if (empty($_POST['ctNumId']) || empty($_POST['ctNomCol']) || empty($_POST['ctEmaCol']) || empty($_POST['ctPassCol']) || empty($_POST['ctDirCol']) || empty($_POST['ctTelCol']) || empty($_POST['selRolUser'])) {
                    redirect("?b=profile&s=optionSaveRedirec&p=colaborador")->error("Se deben llenar todos los campos")->send();
                } else {
                    if ($this->object->verifyLeterString($_POST['ctNumId'])) {
                        redirect("?b=profile&s=optionSaveRedirec&p=colaborador")->error("El numero de identificacion no puede llevar letras")->send();
                    } else {
                        if ($this->object->verifyNumberString($_POST['ctNomCol'])) {
                            redirect("?b=profile&s=optionSaveRedirec&p=colaborador")->error("El nombre no puede llevar numeros")->send();
                        } else {
                            if (!$this->object->verifyEmailString($_POST['ctEmaCol'])) {
                                redirect("?b=profile&s=optionSaveRedirec&p=colaborador")->error("Formato de correo electronico invalido")->send();
                            } else {
                                if ($this->object->verifyLeterString($_POST['ctTelCol'])) {
                                    redirect("?b=profile&s=optionSaveRedirec&p=colaborador")->error("Se deben llenar todos los campos")->send();
                                } else {
                                    if($this->object->verifyPasswordString($_POST['ctPassCol'])){
                                        $numid = $_POST['ctNumId'];
                                        $name = $_POST['ctNomCol'];
                                        $ema = $_POST['ctEmaCol'];
                                        $pass = md5($_POST['ctPassCol']);
                                        $dir = $_POST['ctDirCol'];
                                        $tel = $_POST['ctTelCol'];
                                        $ocup = $_POST['selRolUser'];

                                        if ($this->object->saveColaborador($numid, $name, $ema, $pass,$dir, $tel, $ocup)) {
                                            redirect("?b=profile&s=Inicio&p=admin")->success("Se ha agregado el colaborador correctamente")->send();
                                        } else {
                                            redirect("?b=profile&s=Inicio&p=admin")->error("Error al crear el usuario")->send();
                                        }
                                    } else {
                                        redirect("?b=profile&s=optionSaveRedirec&p=colaborador")->error("La contraseña no cumple con los requisitos minimos de seguridad. ")->send();
                                    }
                                }
                            }
                        }
                    }
                }
                break;
            case 'cliente':
                if(empty($_POST['idmas']) || empty($_POST['nommas']) || empty($_POST['edadmas']) || empty($_POST['selGenMas']) || empty($_POST['selEspMas'])){}
                break;  
            default:
                redirect("?b=profile&s=Inicio&p=admin")->error("404 Not Found: Accion invalida")->send();
                break;
        }
    }

    //-----Metodo para actualizar Datos de Usuario-----//
    public function updateUser()
    {
        if (isset($_REQUEST['btnUpdateProfile'])) {
            if ($_POST['ctNameUser'] == "" || $_POST['ctSurNameUser'] == "" || $_POST['ctNickUser'] == "" || $_POST['ctAdrUser'] ==  "" || $_POST['ctEmailUser'] == "" || $_POST['ctNumCelUser'] == "") {
                redirect("?b=profile&s=Inicio&p=admin&v=true")->error("Se deben llenar todos los campos")->send();
            } else {
                $u = new Profile();
                $u->id = $_POST['ctIdUser'];
                $u->nombre = $_POST['ctNameUser'];
                $u->apellido = $_POST['ctSurNameUser'];
                $u->nick = $_POST['ctNickUser'];
                $u->email = $_POST['ctEmailUser'];
                $u->direccion = $_POST['ctAdrUser'];
                $u->numcel = $_POST['ctNumCelUser'];
                $u->numcel2 = $_POST['ctNumCel2'];
                if ($this->object->update($u)) {
                    if ($_POST['ctNickUser'] != $_SESSION["usuario"]) {
                        session_destroy();
                        redirect("index.php")->success("Se ha actualizado el nombre de usuario, vuelva a iniciar sesión")->send();
                    } else {
                        redirect("?b=profile&s=Inicio&p=admin")->success("Se ha actualizado la información del usuario")->send();
                    }
                } else {
                    redirect("?b=profile&s=Inicio&p=admin")->error("No se pudo actualizar el usuario")->send();
                }
            }
        }
    }

    // -----Metodo para actualizar datos de Colaboradores y Proveedores----- //
    public function updateProfile()
    {
        $rol = $_REQUEST['p'];
        switch ($rol) {
            case 'colaborador':
                if (isset($_REQUEST['idcola'])) {
                    if (empty($_POST['idcol']) || empty($_POST['nomcol']) || empty($_POST['dircol']) || empty($_POST['emacol']) || empty($_POST['telcol']) || empty($_POST['rolcol'])) {
                        $colaboradorId = $_REQUEST['idcola'];
                        redirect("?b=profile&s=optionEditRedirec&p=colaborador&idcola=" . $colaboradorId)->error("Complete todos los campos")->send();
                    } else {
                        if ($this->object->verifyNumberString($_POST['nomcol'])) {
                            $colaboradorId = $_REQUEST['idcola'];
                            redirect("?b=profile&s=optionEditRedirec&p=colaborador&idcola=" . $colaboradorId)->error("El nombre no puede conetener numeros")->send();
                        } else {
                            if ($this->object->verifyEmailString($_POST['emacol'])) {
                                if ($this->object->verifyNumberString($_POST['rolcol'])) {
                                    $colaboradorId = $_REQUEST['idcola'];
                                    redirect("?b=profile&s=optionEditRedirec&p=colaborador&idcola=" . $colaboradorId)->error("El rol no puede conetener numeros")->send();
                                } else {
                                    if ($this->object->verifyLeterString($_POST['telcol'])) {
                                        $colaboradorId = $_REQUEST['idcola'];
                                        redirect("?b=profile&s=optionEditRedirec&p=colaborador&idcola=" . $colaboradorId)->error("El numero de telefono no puede contener letras")->send();
                                    } else {
                                    }
                                    $id = $_POST['idcol'];
                                    $name = $_POST['nomcol'];
                                    $dir = $_POST['dircol'];
                                    $ema = $_POST['emacol'];
                                    $tel = $_POST['telcol'];
                                    $rolc = $_POST['rolcol'];

                                    if ($this->object->updateColaborador($id, $name, $dir, $ema, $tel, $rolc)) {
                                        redirect("?b=profile&s=Inicio&p=admin")->success("Se ha actualizado la información del colaborador")->send();
                                    } else {
                                        redirect("?b=profile&s=Inicio&p=admin")->error("No se pudo actualizar la informacion del colaborador")->send();
                                    }
                                }
                            } else {
                                $colaboradorId = $_REQUEST['idcola'];
                                redirect("?b=profile&s=optionEditRedirec&p=colaborador&idcola=" . $colaboradorId)->error("El correo electronico no cumple con su formato")->send();
                            }
                        }
                    }
                }
                break;
            case 'proveedor':
                if (isset($_REQUEST['idprov'])) {
                    if (empty($_POST['ctIdProv']) || empty($_POST['ctNomProv']) || empty($_POST['ctDirProv']) || empty($_POST['ctEmaProv']) || empty($_POST['ctTelProv'])) {
                        $ProveedorId = $_REQUEST['idprov'];
                        redirect("?b=profile&s=optionEditRedirec&p=proveedor&idprov=" . $ProveedorId)->error("Complete todos los campos")->send();
                    } else {
                        if ($this->object->verifyNumberString($_POST['ctNomProv'])) {
                            $ProveedorId = $_REQUEST['idprov'];
                            redirect("?b=profile&s=optionEditRedirec&p=proveedor&idprov=" . $ProveedorId)->error("El nombre no puede conetener numeros")->send();
                        } else {
                            if ($this->object->verifyEmailString($_POST['ctEmaProv'])) {
                                if ($this->object->verifyLeterString($_POST['ctTelProv'])) {
                                    $ProveedorId = $_REQUEST['idprov'];
                                    redirect("?b=profile&s=optionEditRedirec&p=proveedor&idprov=" . $ProveedorId)->error("El numero de telefono no puede contener letras")->send();
                                } else {
                                    $id = $_POST['ctIdProv'];
                                    $name = $_POST['ctNomProv'];
                                    $dir = $_POST['ctDirProv'];
                                    $ema = $_POST['ctEmaProv'];
                                    $tel = $_POST['ctTelProv'];

                                    if ($this->object->updateProveedor($id, $name, $dir, $ema, $tel)) {
                                        redirect("?b=profile&s=Inicio&p=admin")->success("Se ha actualizado la información del proveedor")->send();
                                    } else {
                                        redirect("?b=profile&s=Inicio&p=admin")->error("No se pudo actualizar la informacion del proveedor")->send();
                                    }
                                }
                            } else {
                                $ProveedorId = $_REQUEST['idprov'];
                                redirect("?b=profile&s=optionEditRedirec&p=proveedor&idprov=" . $ProveedorId)->error("El correo electronico no cumple con su formato")->send();
                            }
                        }
                    }
                }else{
                    $ProveedorId = $_REQUEST['idprov'];
                    redirect("?b=profile&s=Inicio&p=admin")->error("Error: no se puede identificar el proveedor.")->send();
                }
                break;
            case 'cliente': 
                if(isset($_REQUEST['numid'])){
                    if(empty($_POST['idcli']) || empty($_POST['nomcli']) || empty($_POST['emacli']) || empty($_POST['usercli']) || empty($_POST['dircli']) || empty($_POST['zona']) || empty($_POST['telcli'])){
                        $clienteId = $_REQUEST['numid'];
                        redirect("?b=profile&s=optionEditRedirec&p=cliente&idcli=" . $clienteId)->error("Complete todos los campos con el (*)")->send();    
                    }else{
                        if($this->object->verifyLeterString($_POST['idcli'])){
                            $clienteId = $_REQUEST['numid'];
                            redirect("?b=profile&s=optionEditRedirec&p=cliente&idcli=" . $clienteId)->error("El numero de identificacion no puede llevar letras. ")->send();  
                        }else{
                            if($this->object->verifyNumberString($_POST['nomcli'])){
                                $clienteId = $_REQUEST['numid'];
                                redirect("?b=profile&s=optionEditRedirec&p=cliente&idcli=" . $clienteId)->error("El nombre no puede llevar numeros. ")->send();  
                            }else{
                                if(!$this->object->verifyEmailString($_POST['emacli'])){
                                    $clienteId = $_REQUEST['numid'];
                                    redirect("?b=profile&s=optionEditRedirec&p=cliente&idcli=" . $clienteId)->error("El formato del correo electronico es invalido. ")->send();  
                                }else{ 
                                    if($this->object->userExist("usercli", "cliente", "usercli", $_POST['usercli'])){
                                        $clienteId = $_REQUEST['numid'];
                                        redirect("?b=profile&s=optionEditRedirec&p=cliente&idcli=" . $clienteId)->error("Ya existe un nombre de usuario con ese nickuser. ")->send();  
                                    }else{
                                        if($this->object->verifyLeterString($_POST['telcli']) || $this->object->verifyLeterString($_POST['telaltcli'])){
                                            $clienteId = $_REQUEST['numid'];
                                            redirect("?b=profile&s=optionEditRedirec&p=cliente&idcli=" . $clienteId)->error("Los numero de telefono no pueden llevar letras.")->send();  
                                        }else{
                                            $id = $_POST['idcli'];
                                            $nom = $_POST['nomcli'];
                                            $ema = $_POST['emacli'];
                                            $nick = $_POST['usercli'];
                                            $dir = $_POST['dircli'];
                                            $zone = $_POST['zona'];
                                            $tel = $_POST['telcli'];
                                            $tel2 = $_POST['telaltcli'];

                                            if($this->object->updateCliente($id, $nom, $ema, $nick, $dir, $zone, $tel, $tel2)){
                                                redirect("?b=profile&s=Inicio&p=admin")->success("Se ha actualizado la información del cliente")->send();
                                            }else{
                                                $clienteId = $_REQUEST['numid'];
                                                redirect("?b=profile&s=optionEditRedirec&p=cliente&idcli=" . $clienteId)->error("Error al actualizar la informacion del cliente.")->send();  
                                            }
                                        }
                                    } 
                                }
                            }
                        }
                    }
                }else{
                    redirect("?b=profile&s=Inicio&p=admin")->error("Error: no se puede identificar el cliente")->send();
                }
                break; 
            case 'mascota':
                if(isset($_REQUEST['id'])){
                    if(empty($_POST['idmas']) || empty($_POST['nommas']) || empty($_POST['edadmas']) || empty($_POST['genmas']) || empty($_POST['espmas'])){
                        $idmas = $_REQUEST['id'];
                        redirect("?b=profile&s=optionEditRedirec&p=mascota&idmas=" . $idmas)->error("Complete todos los campos.")->send();
                    }else{
                        if($this->object->verifyLeterString($_POST['idmas'])){
                            $idmas = $_REQUEST['id'];
                            redirect("?b=profile&s=optionEditRedirec&p=mascota&idmas=" . $idmas)->error("El id de la mascota no puede tener letras.")->send();
                        }else{
                            if($this->object->verifyNumberString($_POST['nommas'])){
                                $idmas = $_REQUEST['id'];
                                redirect("?b=profile&s=optionEditRedirec&p=mascota&idmas=" . $idmas)->error("El nombre de la mascota no puede tener numeros")->send();
                            }else{
                                if($this->object->verifyLeterString($_POST['edadmas'])){
                                    $idmas = $_REQUEST['id'];
                                    redirect("?b=profile&s=optionEditRedirec&p=mascota&idmas=" . $idmas)->error("La edad debe ser solamente con numeros.")->send();
                                }else{
                                    $id = $_POST['idmas']; 
                                    $name = $_POST['nommas']; 
                                    $age = $_POST['edadmas']; 
                                    $gen = $_POST['genmas']; 
                                    $esp = $_POST['espmas']; 

                                    if($this->object->updateMascota($id, $name, $age, $gen, $esp)){
                                        redirect("?b=profile&s=Inicio&p=admin")->success("Se ha actualizado la información de la mascota")->send();
                                    }else{
                                        redirect("?b=profile&s=Inicio&p=admin")->error("Error al actualizar la informacion de la mascota")->send();
                                    }
                                }
                            }
                        }
                    }
                }else{
                    redirect("?b=profile&s=Inicio&p=admin")->error("Error: no se puede identificar la mascota")->send();
                }                
                break; 
            default:
                redirect("?b=profile&s=Inicio&p=admin")->error("404 Not Found: Pagina no encontrada")->send();
                break;
        }
    }


    public function deleteProfile(){
        $o = $_REQUEST['p']; 
        $id = $_REQUEST['id']; 
        switch ($o) {
            case 'proveedor':
                $table = "proveedor"; 
                $param = "idprov"; 
                var_dump($action = $this->object->deleteUser($table, $param, $id));
                if($action){
                    redirect("?b=profile&s=Inicio&p=admin")->success("Se ha eliminado el proveedor con exito")->send();
                }else{
                    redirect("?b=profile&s=Inicio&p=admin")->error("No se pudo eliminar el proveedor, revise que no haya ningun producto asignado a este proveedor. ")->send();
                }
                break;
                case 'cliente':
                    $table = "cliente"; 
                    $param = "idcli"; 
                    var_dump($action = $this->object->deleteUser($table, $param, $id));
                    if($action){
                        redirect("?b=profile&s=Inicio&p=admin")->success("Cliente eliminado con exito!")->send();
                    }else{
                        redirect("?b=profile&s=Inicio&p=admin")->error("No se pudo eliminar el cliente, revise que no haya ninguna mascota asociada a este cliente.")->send();
                    }
                    break;
                case 'colaborador':
                    $table = "colaborador"; 
                    $param = "idcol"; 
                    var_dump($action = $this->object->deleteUser($table, $param, $id));
                    if($action){
                        redirect("?b=profile&s=Inicio&p=admin")->success("Colaborador eliminado con exito!")->send();
                    }else{
                        redirect("?b=profile&s=Inicio&p=admin")->error("No se pudo eliminar el colaborador")->send();
                    }
                    break;
                case 'mascota':
                    $table = "mascota"; 
                    $param = "idmas"; 
                    var_dump($action = $this->object->deleteUser($table, $param, $id));
                    if($action){
                        redirect("?b=profile&s=Inicio&p=admin")->success("Mascota eliminada con exito!")->send();
                    }else{
                        redirect("?b=profile&s=Inicio&p=admin")->error("No se pudo eliminar la cliente.")->send();
                    }
                    break;
            default:
                # code...
                break;
        }

    }

    //Metodo para cerrar Sesion
    public function cerrarSesion()
    {
        session_destroy();
        redirect("index.php")->success("Se ha cerrado la sesion correctamente")->send();
        exit();
    }
}
