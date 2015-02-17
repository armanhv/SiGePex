<?php
include '../../business/horarioBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idHorario = $_POST['idHorario'];
$dias = $_POST['dias'];
$horaInicio = $_POST['horaInicio'];
$horaSalida = $_POST['horaSalida'];

//comunicacion con business
$horarioBusiness = new horarioBusiness();

//intancina de horario
$horario = new horario($idHorario, $dias, $horaInicio, $horaSalida);

//se actualiza
$result = $horarioBusiness->updateHorario($horario);

if ($result) {
    echo 'Se actualizo corectamente.';
}else {
    echo 'Error al actualizar.';
}