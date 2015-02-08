<?php

include '../../business/tipoServicioBusiness.php';

$nombreTipoServicio = $_POST['tipoServicio'];
$precio = $_POST['precio'];
$descripcionTipoServicio = $_POST['descripcionTipoServicio'];

$precio = str_replace(".", "", $precio);
$precio = str_replace(",", ".", $precio);
$precio = str_replace("₡", "", $precio);

$tipoServicioBusines = new tipoServicioBusines();

$newTipoSercio = new tipoServicio(0, $nombreTipoServicio, $precio, $descripcionTipoServicio);

$resultado = $tipoServicioBusines->insertarTipoServicio($newTipoSercio);

if ($resultado) {
    echo 'Se inserto correctamente.';
} else {
    echo 'Error al insertar.';
}