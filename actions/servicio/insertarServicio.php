<?php

include '../../business/servicioBusiness.php';
include '../../business/ingresosBusiness.php';
include '../../business/cuentasPorCobrarBusiness.php';

$idCliente = $_POST['idCliente'];
$idEmpleado = $_POST['idEmpleado'];
$idTipoServicio = $_POST['idTipoServicio'];
$descripcionServicio = $_POST['descripcion'];
$fechaServicio = $_POST['fechaServicio'];
$formaDePago = $_POST['formaPago'];
$cargosExtra = $_POST['cargosExtra'];
$total = $_POST['total'];
$numBoucher = $_POST['numBoucher'];
$fechaPago = $_POST['fechaPago'];

$cargosExtra = str_replace(".", "", $cargosExtra);
$cargosExtra = str_replace(",", ".", $cargosExtra);
$cargosExtra = str_replace("₡", "", $cargosExtra);

$servicioBusiness = new servicioBusines();
$ingresosBusiness = new ingresosBusiness();
$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();

$newServicio = new servicio(0, $idCliente, $idEmpleado, $idTipoServicio, $descripcionServicio, $fechaServicio, $formaDePago, $cargosExtra, $total);
$newIngreso = new ingresos(0, $idEmpleado, $idCliente, $formaDePago, $numBoucher, $total, $fechaServicio);
$newCuentaPorCobrar = new cuentasPorCobrar(0, $idEmpleado, $idCliente, $fechaPago, $total);

$result1 = $servicioBusiness->insertarServicio($newServicio);
$result2 = $ingresosBusiness->insertarIngreso($newIngreso);
$result3 = $cuentasPorCobrarBusiness->insertarCuentaPorCobrar($newCuentaPorCobrar);

if ($result1 && $result2 && $result3) {
    echo 'Se inserto correctamente.';
} else {
    echo 'Error al insertar.';
}

