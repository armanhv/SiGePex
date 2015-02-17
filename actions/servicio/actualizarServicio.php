<?php

include '../../business/servicioBusiness.php';
include '../../business/ingresosBusiness.php';
include '../../business/cuentasPorCobrarBusiness.php';
include '../../business/servicioCuentasPorCobrarBusiness.php';
include '../../business/servicioIngresoBusiness.php';

//variables de resultado
$resultado1 = FALSE;
$resultado2 = FALSE;
$resultado3 = FALSE;
$resultado4 = FALSE;

//echo 'ID SERVICIO: ' . $servicioIngresosBusiness->obtenerUltimoIDServicio() . 'ID Ingreso: ' . $servicioIngresosBusiness->obtenerUltimoIDIngreso();
//obtengo los valores q vienen por post
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
$descripcionCargoExtra = $_POST['descripcionCargoExtra'];

$cargosExtra = str_replace(".", "", $cargosExtra);
$cargosExtra = str_replace(",", ".", $cargosExtra);
$cargosExtra = str_replace("₡", "", $cargosExtra);

//para limpiar valores
if ($formaDePago != "2") {
    $numBoucher = "";
} 

//comunicacion con business
$servicioBusiness = new servicioBusines();
$ingresosBusiness = new ingresosBusiness();
$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();
$servicioCuentasPorCobrarBusiness = new servicioCuentasPorCobrarBusiness();
$servicioIngresosBusiness = new servicioIngresoBusiness();

// Se Realizan las busquedas
$servicio = $servicioBusiness->buscarServicio($idServicio);
$ingresoServicio = $servicioIngresosBusiness->buscarServicioIngresos($idServicio);
$cuentasPorCobrarServicio = $servicioCuentasPorCobrarBusiness->buscarServicioCuentasPorCobrar($idServicio);

if ($ingresoServicio->idIngreso > 0) {
    $ingreso = $ingresosBusiness->buscarIngresos($ingresoServicio->idIngreso);
} else if ($cuentasPorCobrarServicio->idCuentasPorCobrarServicio > 0) {
    $cuentaPorCobrar = $cuentasPorCobrarBusiness->buscarCuentasPorCobrar($cuentasPorCobrarServicio->idCuentasPorCobrarServicio);
}

if (isset($cuentaPorCobrar)) {
    $idCuentasPorCobrar = $cuentaPorCobrar->idCuentasPorCobrar;
} else {
    $idCuentasPorCobrar = 0;
}
if (isset($ingreso)) {
    $idIngresos = $ingreso->idIngresos;
} else {
    $idIngresos = 0;
}


//objetos a actualizar
$newServicio = new servicio($idServicio, $idCliente, $idEmpleado, $idTipoServicio, $descripcionServicio, $fechaServicio, $formaDePago, $cargosExtra, $total, 0, $descripcionCargoExtra);
$newIngreso = new ingresos($idIngresos, $idEmpleado, $idCliente, $formaDePago, $numBoucher, $total, $fechaServicio);
$newCuentaPorCobrar = new cuentasPorCobrar($idCuentasPorCobrar, $idEmpleado, $idCliente, $total);

/* +++++ AQUI VA LO Q ESTA EN LA PIZARRA +++++ */

//pregunto cual forma de pago viene
if ($formaDePago == "1") {//credito
    if ($servicio->formaDePago == "1") {

        //se actualizan los datos
        $resultado1 = $servicioBusiness->actualizarServicio($newServicio);
        $resultado2 = $cuentasPorCobrarBusiness->actualizarCuentaPorCobrar($newCuentaPorCobrar);
        $resultado3 = TRUE; //para evitar errores
        $resultado4 = TRUE; // para evirar errores
    } else if ($servicio->formaDePago == "2" || $servicio->formaDePago == "3") {

        //se elimina la cuenta por cobrar, se inserta el ingreso
        $resultado1 = $ingresosBusiness->eliminarIngresos($idIngresos);
        $resultado2 = $cuentasPorCobrarBusiness->insertarCuentaPorCobrar(new cuentasPorCobrar(0, $idEmpleado, $idCliente, $total));

        //se actualizan los datos
        $resultado3 = $servicioBusiness->actualizarServicio($newServicio);

        //obtengo los ID'S 
        $newServicioCuentasPorCobrar = new servicioCuentasPorCobrar($servicioCuentasPorCobrarBusiness->obtenerUltimoIDServicio(), $servicioCuentasPorCobrarBusiness->obtenerUltimoIDCuentasPorCobrar());

        //Se establese la nueva relación
        $resultado4 = $servicioCuentasPorCobrarBusiness->insertarServicioCuentasPorCobrar($newServicioCuentasPorCobrar);
    }// fin else if anidado
} else if ($formaDePago == "2" || $formaDePago == "3") {
    if ($servicio->formaDePago == "1") {

        //se elimina la cuenta por cobrar, se inserta el ingreso
        $resultado1 = $cuentasPorCobrarBusiness->borrarCuentaPorCobrar($idCuentasPorCobrar);
        $resultado2 = $ingresosBusiness->insertarIngreso(new ingresos(0, $idEmpleado, $idCliente, $formaDePago, $numBoucher, $total, $fechaServicio));

        //se actualizan los datos
        $resultado3 = $servicioBusiness->actualizarServicio($newServicio);

        //obtengo los ID'S 
        $newServicioIngreso = new servicioIngreso($servicioIngresosBusiness->obtenerUltimoIDServicio(), $servicioIngresosBusiness->obtenerUltimoIDIngreso());

        //Se establese la nueva relación
        $resultado4 = $servicioIngresosBusiness->insertarServicioIngreso($newServicioIngreso);
    } else if ($servicio->formaDePago == "2" || $servicio->formaDePago == "3") {

        //se actualizan los datos
        $resultado1 = $servicioBusiness->actualizarServicio($newServicio);
        $resultado2 = $ingresosBusiness->actualizarIngresos($newIngreso);
        $resultado3 = TRUE; //para evitar errores
        $resultado4 = TRUE; // para evirar errores
    }// fin else if anidado
}

/* +++++ AQUI VA LO Q ESTA EN LA PIZARRA +++++ */

if ($resultado1 && $resultado2 && $resultado3 && $resultado4) {
    echo 'Se modificó corectamente.';
} else {
    echo 'Error al modificar.';
}