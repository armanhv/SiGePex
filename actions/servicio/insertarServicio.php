<?php

include '../../business/servicioBusiness.php';
include '../../business/ingresosBusiness.php';
include '../../business/cuentasPorCobrarBusiness.php';
include '../../business/servicioCuentasPorCobrarBusiness.php';
include '../../business/servicioIngresoBusiness.php';

//obtengo los valores q vienen por post
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

//instancias de BUSINESS
$servicioBusiness = new servicioBusines();
$ingresosBusiness = new ingresosBusiness();
$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();
$servicioCuentasPorCobrarBusiness = new servicioCuentasPorCobrarBusiness();
$servicioIngresosBusiness = new servicioIngresoBusiness();

//Se crean los OBJETOS
$newServicio = new servicio(0, $idCliente, $idEmpleado, $idTipoServicio, $descripcionServicio, $fechaServicio, $formaDePago, $cargosExtra, $total);
$newIngreso = new ingresos(0, $idEmpleado, $idCliente, $formaDePago, $numBoucher, $total, $fechaServicio);
$newCuentaPorCobrar = new cuentasPorCobrar(0, $idEmpleado, $idCliente, $fechaPago, $total);

//preguntar cual forma de pago viene para saber en que tablas insertar
if ($formaDePago == "1") {
    $result1 = $servicioBusiness->insertarServicio($newServicio);
    $result2 = $cuentasPorCobrarBusiness->insertarCuentaPorCobrar($newCuentaPorCobrar);

    //se obtienen los ID'S
    $newServicioCuentasPorCobrar = new servicioCuentasPorCobrar($servicioCuentasPorCobrarBusiness->obtenerUltimoIDServicio(), $servicioCuentasPorCobrarBusiness->obtenerUltimoIDCuentasPorCobrar());

    //se inserta la la relacion de las tablas
    $result3 = $servicioCuentasPorCobrarBusiness->insertarServicioCuentasPorCobrar($newServicioCuentasPorCobrar);
} else {
    $result1 = $servicioBusiness->insertarServicio($newServicio);
    $result2 = $ingresosBusiness->insertarIngreso($newIngreso);
    
    //obtengo los ID'S 
    $newServicioIngreso = new servicioIngreso($servicioIngresosBusiness->obtenerUltimoIDServicio(), $servicioIngresosBusiness->obtenerUltimoIDIngreso());

    $result3 = $servicioIngresosBusiness->insertarServicioIngreso($newServicioIngreso);
}

//mostrar los resultados
if ($result1 && $result2 && $result3) {
    echo 'Se inserto correctamente.';
} else {
    echo 'Error al insertar.';
}

