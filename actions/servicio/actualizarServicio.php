<?php

include '../../business/servicioBusiness.php';

$idServicio = $_POST['idServicio'];
$idCliente = $_POST['idCliente'];
$idEmpleado = $_POST['idEmpleado'];
$idTipoServicio = $_POST['idTipoServicio'];
$descripcionServicio = $_POST['descripcion'];
$fechaServicio = $_POST['fechaServicio'];
$formaDePago = $_POST['formaPago'];

$servicioBusiness = new servicioBusines();

$newServicio = new servicio($idServicio, $idCliente, $idEmpleado, $idTipoServicio, $descripcionServicio, $fechaServicio, $formaDePago);

//se actualiza
$resultado = $servicioBusiness->actualizarServicio($newServicio);

if ($resultado) {
    echo 'Se modificó corectamente.';
} else {
    echo 'Error al modificar.';
}
