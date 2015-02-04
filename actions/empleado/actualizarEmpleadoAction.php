<?php

include '../../business/empleadoBusiness.php';

$idEmpleado = $_POST['idEmpleado'];
$idCedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$primerApellido = $_POST['primerApellido'];
$segundoApellido = $_POST['segundoApellido'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$emailEmpleado = $_POST['emailEmpleado'];
$direccionEmpleado = $_POST['direccionEmpleado'];
$login = $_POST['login'];
$pass = $_POST['pass'];
$cantidadHoras = $_POST['cantidadHoras'];
$costoHoraExtra = $_POST['costoHoraExtra'];
$tiempoAlmuerzo = $_POST['tiempoAlmuerzo'];
$idRol = $_POST['idRol'];

$costoHoraExtra = str_replace(".", "", $costoHoraExtra);
$costoHoraExtra = str_replace(",", ".", $costoHoraExtra);
$costoHoraExtra = str_replace("₡", "", $costoHoraExtra);

$empleadoBusiness = new empleadoBusiness();
$rol = new rol($idRol, "");

$newEmpleado = new Empleado($idEmpleado, $idCedula, $nombre, $primerApellido, $segundoApellido, $fechaNacimiento, $emailEmpleado, $direccionEmpleado, $login, $pass, $cantidadHoras, $costoHoraExtra, $tiempoAlmuerzo, $rol);

$result = $empleadoBusiness->actualizarEmpleado($newEmpleado);

if ($result) {
    echo '<span id="resultado">El empleado se actualizó correctamente</span>';
} else {
    echo '<span id="resultado">El empleado no se actualizó</span>';
}
