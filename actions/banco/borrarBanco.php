<?php

include '../../business/bancoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idBanco = $_POST['idBanco'];
//comunicacion con business
$bancoBusiness = new bancoBusiness();
//se actualiza
$resultado = $bancoBusiness->deleteBanco($idBanco);

if ($resultado) {
    echo 'Se elimino corectamente.';
}else {
    echo 'Error al actualizar.';
}