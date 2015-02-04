<?php

include '../../business/ingresosBusiness.php';

//los valores almacenados que se enviaron por el adm

$idEmpleado = $_POST['idEmpleado'];
$idCliente = $_POST['idCliente'];
$tipoPago = $_POST['tipoPago'];
$numBoucher = $_POST['numBoucher'];
$monto = $_POST['monto'];
$fechaIngreso = $_POST['fechaIngreso'];
//comunucacion con Business
$ingresosBusiness = new ingresosBusiness();

//se crea una instancia de cuenta
$newIngresos = new ingresos(0, $idEmpleado, $idCliente, $tipoPago, $numBoucher, $monto,$fechaIngreso);

//echo $idEmpleado . ' - ' . $nombreBanco . ' - ' . $numeroCuenta . ' - ' . $tipoCuenta . ' - ' . $numeroSimpe;

//se inserta la cuenta
$result = $ingresosBusiness->insertarIngreso($newIngresos);

if ($result) {
    echo '<span class="correcto"> Parto Registrado con &Eacute;xito </span>';
} else {
    echo '<span class="incorrecto"> Parto Registrado sin &Eacute;xito </span>';
}
?>
