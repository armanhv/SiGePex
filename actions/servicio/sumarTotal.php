<?php

include '../../business/tipoServicioBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idTipoServicio = $_POST['idTipoServicio'];
$cargosExtra = $_POST['cargosExtra'];

$cargosExtra = str_replace(".", "", $cargosExtra);
$cargosExtra = str_replace(",", ".", $cargosExtra);
$cargosExtra = str_replace("₡", "", $cargosExtra);

//comunucacion con Business
$tipoServicioBusines = new tipoServicioBusines();

$tipoServicio = $tipoServicioBusines->buscarTipoServicio($idTipoServicio);
$precioTipoServicio = $tipoServicio->precioTipoServicio;

$total = $cargosExtra + $precioTipoServicio;

echo '₡ ' . $total;





