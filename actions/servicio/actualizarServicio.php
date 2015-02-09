<?php

include '../../business/servicioBusiness.php';
include '../../business/ingresosBusiness.php';
include '../../business/cuentasPorCobrarBusiness.php';

$idServicio = $_POST['idServicio'];
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

//para limpiar valores
if ($formaDePago != "2") {
    $numBoucher = "";
} else if ($formaDePago != "1") {
    $fechaPago = "";
}

//comunicacion con business
$servicioBusiness = new servicioBusines();
$ingresosBusiness = new ingresosBusiness();
$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();

//busquedas
$ingreso = $ingresosBusiness->buscarBoucherIngreso($idCliente, $idEmpleado, $fechaServicio); //busco el ingreso
$cuentaPorCobrar = $cuentasPorCobrarBusiness->obtenerFechaPagoCuentaPorCobrar($idEmpleado, $idCliente); //busco la cuenta por cobrar
//objetos a actualizar
$newServicio = new servicio($idServicio, $idCliente, $idEmpleado, $idTipoServicio, $descripcionServicio, $fechaServicio, $formaDePago, $cargosExtra, $total);
$newIngreso = new ingresos($ingreso->idIngresos, $idEmpleado, $idCliente, $formaDePago, $numBoucher, $total, $fechaServicio);
$newCuentaPorCobrar = new cuentasPorCobrar($cuentaPorCobrar->idCuentasPorCobrar, $idEmpleado, $idCliente, $fechaPago, $total);

//se actualizan los datos
$resultado1 = $servicioBusiness->actualizarServicio($newServicio);
$resultado2 = $ingresosBusiness->actualizarIngresos($newIngreso);
$resultado3 = $cuentasPorCobrarBusiness->actualizarCuentaPorCobrar($newCuentaPorCobrar);

if ($resultado1 && $resultado2 && $resultado3) {
    echo 'Se modificó corectamente.';
} else {
    echo 'Error al modificar.';
}