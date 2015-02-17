<?php

include '../../business/cuentaBusiness.php';

$idCuenta = $_POST['idCuenta'];

//instancia de business
$cuentaBusiness = new cuentaBusiness();

//se elimina
$resultado = $cuentaBusiness->eliminarCuenta($idCuenta);

if ($resultado){
    echo 'Cuenta eliminado correctamente.';
}  else {
    echo 'No se elimino la cuenta.';
}

?>
