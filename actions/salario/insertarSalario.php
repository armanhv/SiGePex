<?php

include '../../business/salarioBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idEmpleado = $_POST['idEmpleado'];
$salarioBase = $_POST['salarioBase'];
$horasExtras = $_POST['horasExtra'];
$bonificaciones = $_POST['bonificaciones'];
$diasExtra = $_POST['diasExtra'];

$salarioBase = str_replace(".", "", $salarioBase);
$salarioBase = str_replace(",", ".", $salarioBase);
$salarioBase = str_replace("₡", "", $salarioBase);

$horasExtras = str_replace(".", "", $horasExtras);
$horasExtras = str_replace(",", ".", $horasExtras);
$horasExtras = str_replace("₡", "", $horasExtras);

$bonificaciones = str_replace(".", "", $bonificaciones);
$bonificaciones = str_replace(",", ".", $bonificaciones);
$bonificaciones = str_replace("₡", "", $bonificaciones);

$diasExtra = str_replace(".", "", $diasExtra);
$diasExtra = str_replace(",", ".", $diasExtra);
$diasExtra = str_replace("₡", "", $diasExtra);

//comunucacion con Business
$salarioBusines = new salarioBusiness();

//se crea una instancia de horario
$newSalario = new salario(0, $idEmpleado, $salarioBase, $horasExtras, $bonificaciones, $diasExtra);

//se inserta el horario
$resultado = $salarioBusines->insertarSalario($newSalario);

if ($resultado) {
    echo 'Se inserto correctamente.';
} else {
    echo 'Error al insertar.';
}