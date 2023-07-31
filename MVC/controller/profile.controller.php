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
    public function optionEditRedirec(){
        $o = $_REQUEST['p']; 
        switch ($o) {
            case 'proveedor':
                $style = "<link rel='stylesheet' type='text/css' href='assets/css/style-editarInfo.css'>"; 
                require_once "view/head.php"; 
                require_once "view/profile/admin/edit/editar-proveedor.php";  
                break;
            case 'colaborador':
                if($_GET['idcola']){
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
    public function optionSaveRedirec(){
        $o = $_REQUEST['p']; 
        switch ($o) {
            case 'proveedor':
                require_once "view/profile/admin/save/guardar-proveedor.php";  
                break;
            case 'colaborador':
                    require_once "view/profile/admin/save/guardar-colaborador.php";  
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

    // -----Metodo oara mostrar los resultados del buscador de Clientes------ //
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
    //-----Metodo para actualizar Datos-----//
    public function actualizarUsuario()
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
                        redirect("?b=profile&s=Inicio&p=admin&v=false")->success("Se ha actualizado la información del usuario")->send();
                    }
                } else {
                    redirect("?b=profile&s=Inicio&p=admin&v=false")->error("No se pudo actualizar el usuario")->send();
                }
            }
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
