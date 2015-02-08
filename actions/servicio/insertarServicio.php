<?php

include '../../business/servicioBusiness.php';

$idCliente = $_POST['idCliente'];
$idEmpleado = $_POST['idEmpleado'];
$idTipoServicio = $_POST['idTipoServicio'];
$descripcionServicio = $_POST['descripcion'];
$fechaServicio = $_POST['fechaServicio'];
$formaDePago = $_POST['formaPago'];

$servicioBusiness = new servicioBusines();

$newServicio = new servicio(0, $idCliente, $idEmpleado, $idTipoServicio, $descripcionServicio, $fechaServicio, $formaDePago);

$result = $servicioBusiness->insertarServicio($newServicio);

if ($result) {
    echo 'Se inserto correctamente.';
} else {
    echo 'Error al insertar.';
}