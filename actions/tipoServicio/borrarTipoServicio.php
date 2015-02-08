<?php

include '../../business/tipoServicioBusiness.php';

$idTipoServicio = $_POST['idTipoServicio'];

$tipoServicioBusines = new tipoServicioBusines();

//se elimina
$resultado = $tipoServicioBusines->eliminarTipoServicio($idTipoServicio);

if ($resultado){
    echo 'El tipo de servicio se eliminó correctamente.';
}  else {
    echo 'No se eliminó correctamente.';
}
