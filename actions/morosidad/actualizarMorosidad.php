<?php

include '../../business/morosidadBusiness.php';

//los valores almacenados que se enviaron por el cliente
$idMorosidad = $_POST['idMorosidad'];
$idCliente = $_POST['idCliente'];
$fechaMorosidad = $_POST['fechaMorosidad'];
$monto = $_POST['monto'];

$monto = str_replace(".", "", $monto);
$monto = str_replace(",", ".", $monto);
$monto = str_replace("₡", "", $monto);

//comunicacion con business
$morosidadBusiness = new morosidadBusiness();

//intancina de morosidad
$morosidad = new morosidad($idMorosidad, $idCliente, $fechaMorosidad, $monto);

//se actualiza
$resultado = $morosidadBusiness->actualizarMorosidad($morosidad);

if ($resultado) {

    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha actualizado correctamente</p></div>';
} else {

    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha actualizado</p></div>';
}

