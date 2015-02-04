<?php

include '../../business/horarioBusiness.php';
include '../../domain/difHoras.php';

$diferenciaHoras = new difHoras();

//los valores almacenados que se enviarion por el cliente
$idEmpleado = $_POST['idEmpleado'];
$dias = $_POST['dias'];
$horaInicio = $_POST['horaInicio'];
$horaSalida = $_POST['horaSalida'];
$totalHoras = $diferenciaHoras->format($diferenciaHoras->resta($horaInicio, $horaSalida));

//comunucacion con Business
$horarioBusiness = new horarioBusiness();

//se crea una instancia de horario
$newHorario = new horario(0, $idEmpleado, $dias, $horaInicio, $horaSalida, $totalHoras);

//se inserta el horario
$resultado = $horarioBusiness->insertHorario($newHorario);

if ($resultado) {
    echo 'Se inserto correctamente.';
} else {
    echo 'Error al insertar.';
}