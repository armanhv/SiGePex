<?php
include '../../business/cuentaBusiness.php';

$idCuenta = $_POST['idCuenta'];

$cuentaBusiness = new cuentaBusiness();

$stringCuenta = $cuentaBusiness->buscarCuenta($idCuenta);

return $stringCuenta;
?>
