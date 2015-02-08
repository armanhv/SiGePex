<?php

include '../../business/tipoServicioBusiness.php';

$idTipoServicio = $_POST['idTipoServicio'];
$nombreTipoServicio = $_POST['tipoServicio'];
$precio = $_POST['precio'];
$descripcionTipoServicio = $_POST['descripcionTipoServicio'];

$precio = str_replace(".", "", $precio);
$precio = str_replace(",", ".", $precio);
$precio = str_replace("₡", "", $precio);

$tipoServicioBusines = new tipoServicioBusines();

// se cre el objeto a actualizar
$tipoServicio = new tipoServicio($idTipoServicio, $nombreTipoServicio, $precio, $descripcionTipoServicio); 

$resultado = $tipoServicioBusines->actualizarTipoServicio($tipoServicio);

if ($resultado) {
    echo 'Se modificó corectamente.';
} else {
    echo 'Error al modificar.';
}
