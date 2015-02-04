<?php

include '../../business/cuentaBusiness.php';
include '../../business/bancoBusiness.php';

//comunicacion con Business
$cuentaBusiness = new cuentaBusiness();
$bancoBusiness = new bancoBusiness();

$listaCuentas = $cuentaBusiness->obtenerCuentas();


echo '<SELECT onChange="cargarCuentas();" NAME="cbxCuentas" id="cbxCuentas" SIZE=1>';
echo '<option value=0>Elija una Cuenta</option>';

foreach ($listaCuentas as $currentCuenta) {

    $idCuenta = $currentCuenta->idCuenta;
    $idEmpleado = $currentCuenta->idEmpleado;
    $idBanco = $currentCuenta->idBanco;

    $empleado = $cuentaBusiness->buscarEmpleadoCuenta($idEmpleado);
    $banco = $bancoBusiness->buscarBanco($idBanco);
    
    $nombreBanco = $banco->nombreBanco;
    $nombreEmpleado = $empleado->nombreEmpleado . " " . $empleado->primerApellidoEmpleado . " " . $empleado->segundoApellidoEmpleado;

    echo '<option value=' . $idCuenta . '> ' . $nombreBanco . ' - ' . $nombreEmpleado . '</option>';
}

echo '</select>';
