<?php

class ProductModel {
    private $pdo;
    public function getAllProducts() {
        return [
            ['id' => 1, 'name' => 'Producto 1', 'description' => 'Descripción del producto 1', 'image' => 'imagen1.jpg', 'price' => 10.99, 'sale_price' => 9.99, 'quantity' => 20, 'category' => 'Categoría 1', 'distributor' => 'Distribuidor 1'],
            ['id' => 2, 'name' => 'Producto 2', 'description' => 'Descripción del producto 2', 'image' => 'imagen2.jpg', 'price' => 19.99, 'sale_price' => 17.99, 'quantity' => 15, 'category' => 'Categoría 2', 'distributor' => 'Distribuidor 2'],
            ['id' => 3, 'name' => 'Producto 3', 'description' => 'Descripción del producto 3', 'image' => 'imagen3.jpg', 'price' => 8.99, 'sale_price' => 7.99, 'quantity' => 25, 'category' => 'Categoría 1', 'distributor' => 'Distribuidor 1'],
        ];
    }

public function guardar( $data){
    try {
        $sql = 'INSERT INTO producto (idProd,nomprod,desprod,imgprod,precprod,precvenprod,stockprod,catprod, )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?.)';
        $this->pdo->prepare($sql)
        ->execute(
            array(
                $data->idProd,
                $data->nomprod,
                $data->desprod, 
                $data->imgprod,
                $data->precprod,
                $data->precvenprod,
                $data->stockprod,
                $data->catprod,
            )
        );
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
public function Actualizar($data) {
		try {
			$sql = 'UPDATE producto SET
			nomprod = ?,
			desprod = ?,
			imgprod = ?,
            precprod = ?,
			precvenprod = ?,
			stockprod = ?,
            catprod = ?
			WHERE idProd = ?';
			$this->pdo->prepare($sql)
			->execute(
				array(
                    $data->nomprod,
                    $data->desprod,
                    $data->imgprod,
                    $data->precprod,
                    $data->precvenprod,
                    $data->stockprod,
                    $data->catprod,
				)
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>