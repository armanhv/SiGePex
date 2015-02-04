<?php

include '../../business/ingresosBusiness.php';

//los valores almacenados que se enviaron por el adm

$idEmpleado = $_POST['idEmpleado'];
$idCliente = $_POST['idCliente'];
$tipoPago = $_POST['tipoPago'];
$numBoucher = $_POST['numBoucher'];
$monto = $_POST['monto'];
$fechaIngreso = $_POST['fechaIngreso'];

$monto = str_replace(".", "", $monto);
$monto = str_replace(",", ".", $monto);
$monto = str_replace("₡", "", $monto);

//comunucacion con Business
$ingresosBusiness = new ingresosBusiness();

//se crea una instancia de cuenta
$newIngresos = new ingresos(0, $idEmpleado, $idCliente, $tipoPago, $numBoucher, $monto,$fechaIngreso);

//se inserta la cuenta
$result = $ingresosBusiness->insertarIngreso($newIngresos);

if ($result) {
    echo '<span class="correcto">El ingreso se agrego correctamente</span>';
} else {
    echo '<span class="incorrecto">El ingreso no se agregó</span>';
}
