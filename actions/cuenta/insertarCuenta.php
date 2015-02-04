<?php

include '../../business/cuentaBusiness.php';

//los valores almacenados que se enviaron por el adm
$numeroCuenta = $_POST['numeroCuenta'];
$nombreBanco = $_POST['nombreBanco'];
$tipoCuenta = $_POST['tipoCuenta'];
$numeroSimpe = $_POST['numeroSimpe'];
$idEmpleado = $_POST['idEmpleado'];

//comunucacion con Business
$cuentaBusiness = new cuentaBusiness();

//se crea una instancia de cuenta
$newCuenta = new cuenta(0, $numeroCuenta, $nombreBanco, $tipoCuenta, $numeroSimpe, $idEmpleado);

//se inserta la cuenta
$result = $cuentaBusiness->insertarCuenta($newCuenta);

if ($result) {
    echo 'Se inserto correctamente.';
} else {
    echo 'Error al insertar.';
}
?>
