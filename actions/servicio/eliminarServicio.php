<?php

include '../../business/servicioBusiness.php';

$idServicio = $_POST['idServicio'];

$servicioBusiness = new servicioBusines();

//se elimina
$resultado = $servicioBusiness->eliminarServicio($idServicio);

if ($resultado) {
    echo 'Se eliminó corectamente.';
} else {
    echo 'Error al eliminar.';
}
