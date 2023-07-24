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
        $model = new Profile();
        $proveedores = $this->object->getProveedores();
        switch ($rol) {
            case 'admin':
                $name = $_SESSION['usuario'];
                $user = $model->selectUser($usuario);
                $data = compact('user');
                break;
            case 'customer':
                $usuario = $model->selectUser($usuario);
                $data = compact('persona');
                break;
            case 'recepcionist':
                $administrador = $model->selectUser($usuario);
                $data = compact('persona');
                break;
            case 'collaborator':
                $administrador = $model->selectUser($usuario);
                $data = compact('persona');
                break;
            case 'vet':
                $administrador = $model->selectUser($usuario);
                $data = compact('persona');
                break;
            default:
                echo "Rol indefinido";
                break;
        }

        require_once "view/profile/" . $rol . "/profile.php";
        require_once "view/footerprofile.php";
    }

    public function showEdit()
    {
        require_once "view/head.php";
    }
    //-----Metodo para actualizar Datos-----//
    // NO ME TOQUE ESTA PARTE DEL CODIGO SAPO HIJUEPUTA

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
    public function buscarProveedor()
    {
        $searchTerm = $_POST['buscar_proveedor'];

        $proveedores = $this->object->getProveedores();

        $filteredProveedores = array_filter($proveedores, function ($proveedor) use ($searchTerm) {
            return (stripos($proveedor['idprov'], $searchTerm) !== false) ||
                (stripos($proveedor['nomprov'], $searchTerm) !== false);
        });

        // Generar la tabla de resultados y devolverla al cliente
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

    public function EditarInfoemp()
    {
        require_once "view/profile/admin/empleados/editar.php";
    }
    public function Agregar()
    {
        require_once "view/profile/admin/proveedor/agregar.php";
    }

    //Metodo para cerrar Sesion
    public function cerrarSesion()
    {
        session_destroy();
        redirect("index.php")->success("Se ha cerrado la sesion correctamente")->send();
        exit();
    }
}