<?php


include_once 'model/database.php';
include_once 'model/administrador.php';

class UpdateProfileController
{
    public function guardarAdministrador()
    {
       
        if (isset($_SESSION['idamin'])) {
           
            $administrador = [
                'idamin' => $_SESSION['idamin'],
                'nomadmin' => $_POST['ctNameUser'],
                'apeadmin' => $_POST['ctSurNameUser'],
                'diradmin' => $_POST['ctAdrUser'],
                'emaadmin' => $_POST['ctEmailUser'],
                'teladmin' => $_POST['ctNumCel'],
                'teladmin2' => $_POST['ctNumCel2'],
            ];

            // Actualizar los datos del administrador
            $model = new AdministradorModel();
            $model->actualizarAdministrador($administrador);

            header('Location: ?b=profileadministrador');
            return;
        }
    }
}
