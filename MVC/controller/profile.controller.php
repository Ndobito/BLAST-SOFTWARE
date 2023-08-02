<?php
include_once "model/Profile.php";

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
                    $idProveedor = $_GET['idprov'];
                    $proveedor = $this->object->existProveedor($idProveedor);
                    $style = "<link rel='stylesheet' type='text/css' href='assets/css/style-editarInfo.css'>";
                    require_once "view/head.php";
                    require_once "view/profile/admin/edit/editar-proveedor.php";
                }
                break;
            case 'colaborador':
                if ($_GET['idcola']) {
                    $idColaborador = $_GET['idcola'];
                    $colaborador = $this->object->existColaborador($idColaborador);
                    $style = "<link rel='stylesheet' type='text/css' href='assets/css/style-editarInfo.css'>";
                    require_once "view/head.php";
                    require_once "view/profile/admin/edit/editar-colaborador.php";
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
            echo '<td class="icons1"><a href="?b=profile&s=EditarInfo" id="prveedor"><i class="fa fa-pencil fa-lg" aria-hidden="true"></i></a></td>';
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
    public function saveProfile(){
        $rol = $_REQUEST['p']; 
        switch ($rol) {
            case 'proveedor':
                if(empty($_POST['ctNomProv']) || empty($_POST['ctDirProv']) || empty($_POST['ctEmaProv']) || empty($_POST['ctTelProv']) ){
                    redirect("?b=profile&s=optionSaveRedirec&p=proveedor")->error("Se deben llenar todos los campos")->send();        
                }else{
                    if($this->object->verifyNumberString($_POST['ctNomProv'])){
                        redirect("?b=profile&s=optionSaveRedirec&p=proveedor")->error("El nombre no puede llevar numeros")->send();        
                    }else{
                        if($this->object->verifyEmailString($_POST['ctEmaProv'])){
                            redirect("?b=profile&s=optionSaveRedirec&p=proveedor")->error("Formato de correo electronico invalido")->send();
                        }else{
                            if($this->object->verifyLeterString($_POST['ctTelProv'])){
                                redirect("?b=profile&s=optionSaveRedirec&p=proveedor")->error("El numero de telefono no puede llevar letras")->send();
                            }else{
                                $name = $_POST['ctNomProv'];
                                $dir = $_POST['ctDirProv'];
                                $ema = $_POST['ctEmaProv'];
                                $tel = $_POST['ctTelProv'];

                                if($this->object->saveProveedor($name, $dir, $ema, $tel)){
                                    redirect("?b=profile&s=Inicio&p=admin")->success("Se ha agregado el colaborador correctamente")->send();
                                }else{
                                    redirect("?b=profile&s=Inicio&p=admin")->error("Error al crear el usuario")->send();
                                }
                            }
                        }
                    }
                }
                break;
            case 'colaborador':
                if(empty($_POST['ctNomCol']) || empty($_POST['ctEmaCol']) || empty($_POST['ctPassCol']) || empty($_POST['ctDirCol']) || empty($_POST['ctTelCol']) || empty($_POST['selRolUser'])){
                    redirect("?b=profile&s=optionSaveRedirec&p=colaborador")->error("Se deben llenar todos los campos")->send();
                }else{
                    // if($this->object->verifyNumberString($_POST['ctNomCol'])){
                    //     redirect("?b=profile&s=optionSaveRedirec&p=colaborador")->error("El nombre no puede llevar numeros")->send();        
                    // }else{
                    //     if($this->object->verifyEmailString($_POST['ctEmaCol'])){
                    //         redirect("?b=profile&s=optionSaveRedirec&p=colaborador")->error("Formato de correo electronico invalido")->send();
                    //     }else{
                    //         if($this->object->verifyLeterString($_POST['ctTelCol'])){
                    //             redirect("?b=profile&s=optionSaveRedirec&p=colaborador")->error("Se deben llenar todos los campos")->send();
                    //         }else{
                    //             if($this->object->verifyPasswordString($_POST['ctPassCol'])){
                    //                 $name = $_POST['ctNomCol'];
                    //                 $ema = $_POST['ctEmaCol'];
                    //                 $pass = md5($_POST['ctPassCol']);                                    $dir = $_POST['ctDirCol'];
                    //                 $tel = $_POST['ctTelProv'];

                    //                 if($this->object->saveProveedor($name, $dir, $ema, $tel)){
                    //                     redirect("?b=profile&s=Inicio&p=admin")->success("Se ha agregado el colaborador correctamente")->send();
                    //                 }else{
                    //                     redirect("?b=profile&s=Inicio&p=admin")->error("Error al crear el usuario")->send();
                    //                 }
                    //             }else{  
                    //                 redirect("?b=profile&s=optionSaveRedirec&p=colaborador")->error("La contraseña no cumple con los requisitos minimos de seguridad. ")->send();
                    //             }
                    //         }
                    //     }
                    // }
                }
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
                }
                break;
            default:
                redirect("?b=profile&s=Inicio&p=admin")->error("404 Not Found: Pagina no encontrada")->send();
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
