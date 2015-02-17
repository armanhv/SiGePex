<?php

include '../../business/pagoPeriodoBusiness.php';

$idPago = $_POST['idPago'];

//instancia de business
$pagoBusiness = new pagoPeriodoBusiness();

//se elimina
$resultado = $pagoBusiness->eliminarPagoPeriodo($idPago);

if ($resultado){
    echo 'Pago eliminado correctamente.';
}  else {
    echo 'No se elimino el pago.';
}

