<?php

include '../../business/pagoPeriodoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idPago = $_POST['idPago'];
$idEmpleado = $_POST['idEmpleado'];
$fechaInicoPeriodo = $_POST['fechaInicio'];
$fechaFinPeriodo = $_POST['fechaFinal'];
$salarioBasePeriodo = $_POST['salarioBasePeriodo'];
$montoHorasExtra = $_POST['horasExtra'];
$rebajosPeriodo = $_POST['rebajos'];
$descripcionRebajo = $_POST['descripcionRebajo'];

$salarioBasePeriodo = str_replace(".", "", $salarioBasePeriodo);
$salarioBasePeriodo = str_replace(",", ".", $salarioBasePeriodo);
$salarioBasePeriodo = str_replace("₡", "", $salarioBasePeriodo);

$montoHorasExtra = str_replace(".", "", $montoHorasExtra);
$montoHorasExtra = str_replace(",", ".", $montoHorasExtra);
$montoHorasExtra = str_replace("₡", "", $montoHorasExtra);

$rebajosPeriodo = str_replace(".", "", $rebajosPeriodo);
$rebajosPeriodo = str_replace(",", ".", $rebajosPeriodo);
$rebajosPeriodo = str_replace("₡", "", $rebajosPeriodo);


//comunucacion con Business
$pagoBusines = new pagoPeriodoBusiness();

//se crea una instancia de pagoPeriodo
$pagoPeriodo = new pagoPeriodo($idPago, $idEmpleado, $fechaInicoPeriodo, $fechaFinPeriodo, $salarioBasePeriodo, $montoHorasExtra, $rebajosPeriodo, $descripcionRebajo);

//se inserta el horario
$resultado = $pagoBusines->actualizarPagoPeriodo($pagoPeriodo);

if ($resultado) {
    echo 'Se actualizo corectamente.';
} else {
    echo 'Error al actualizar.';
}

