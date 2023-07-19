<?php

include_once 'model/Profile.php';

class SearchController
{
<<<<<<< HEAD
    public function buscarProveedor()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $filtro = $_GET['buscar_proveedor'];
            $model = new Profile();
            $resultados = $model->buscarProveedor($filtro);
            require_once "view/buscador_proveedor.php";
        }
    }
=======

>>>>>>> 2d2d71df0604c37f5e53cbab498709ba2108c014

    public function buscarEmpleado()
    {
        $termino = $_POST['buscar_trabajador'];
<<<<<<< HEAD


=======
>>>>>>> 2d2d71df0604c37f5e53cbab498709ba2108c014
    }
}

$searchController = new SearchController();