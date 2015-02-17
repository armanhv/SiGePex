<?php

include '../../business/horarioBusiness.php';
include '../../utilidades/difHoras.php';

$diferenciaHoras = new difHoras();

//los valores almacenados que se enviarion por el cliente
$idEmpleado = $_POST['idEmpleado'];
$dias = $_POST['dias'];
$horaInicio = $_POST['horaInicio'];
$horaSalida = $_POST['horaSalida'];
$totalHoras = $diferenciaHoras->format($diferenciaHoras->resta($horaInicio, $horaSalida));

$arrayDias = split("\,", $dias);

//comunucacion con Business
$horarioBusiness = new horarioBusiness();

foreach ($arrayDias as $dia) {
    //se crea una instancia de horario
    $newHorario = new horario(0, $idEmpleado, $dia, $horaInicio, $horaSalida, $totalHoras);

    //se inserta el horario
    $resultado = $horarioBusiness->insertHorario($newHorario);
}

if ($resultado == 1) {
    echo '¡ Se agregó correctamente el horario !';
} else if ($resultado == 2) {
    echo '¡ El empleado ya tiene este horario !';
}  else {
    echo '¡ Error al agregar el horario !';
}