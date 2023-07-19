<?php

include_once 'model/Profile.php';

class SearchController
{
    public function buscarProveedor()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $filtro = $_GET['buscar_proveedor'];
            $model = new Profile();
            $resultados = $model->buscarProveedor($filtro);
            require_once "view/buscador_proveedor.php";
        }
    }

    public function buscarEmpleado()
    {
        $termino = $_POST['buscar_trabajador'];


    }
}

$searchController = new SearchController();