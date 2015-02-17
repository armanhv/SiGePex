<?php
include '../../business/bancoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idBanco = $_POST['idBanco'];
$nombreBanco = $_POST['nombreBanco'];

//comunicacion con business
$bancoBusiness = new bancoBusiness();

//intancina de horario
$banco = new banco($idBanco, $nombreBanco);

//se actualiza
$resultado = $bancoBusiness->updateBanco($banco);

if ($resultado) {
    echo 'Se actualizo corectamente.';
}else {
    echo 'Error al actualizar.';
}