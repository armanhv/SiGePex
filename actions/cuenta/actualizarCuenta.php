<?php

include '../../business/cuentaBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idCuenta = $_POST['idCuenta'];
$numeroCuenta = $_POST['numeroCuenta'];
$nombreBanco = $_POST['nombreBanco'];
$tipoCuenta = $_POST['tipoCuenta'];
$numeroSimpe = $_POST['numeroSimpe'];
$idEmpleado = $_POST['idEmpleado'];

//comunucacion con Business
$cuentaBusiness = new cuentaBusiness();

//se crea una instancia de cuenta
$newCuenta = new cuenta($idCuenta, $numeroCuenta, $nombreBanco, $tipoCuenta, $numeroSimpe, $idEmpleado);

//se actualiza
$result = $cuentaBusiness->actualizarCuenta($newCuenta);

if ($result) {
    echo 'Se actualizo corectamente.';
} else {
    echo 'Error al actualizar.';
}
