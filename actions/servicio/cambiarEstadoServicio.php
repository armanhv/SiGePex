<?php
include '../../business/servicioBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idServicio= $_POST['idServicio'];

//comunicacion con business
$servicioBusines = new servicioBusines();

//se actualiza
$result = $servicioBusines->actualizarEstadoServicio($idServicio);

if ($result) {
    echo 'El estado del servicio se modificó correctamente.';
}else {
    echo 'Error al modificar el estado del servicio.';
}