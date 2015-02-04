<?php

include_once '../../business/empleadoBusiness.php';

$idEmpleado = $_POST['cedula'];
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

$newEmpleado = new Empleado(0, $idEmpleado, $nombre, $primerApellido, $segundoApellido, $fechaNacimiento, $emailEmpleado, $direccionEmpleado, $login, $pass, $cantidadHoras, $costoHoraExtra, $tiempoAlmuerzo, $rol);

$resultado = $empleadoBusiness->insertarEmpleado($newEmpleado);

if ($resultado) {
    echo '<span id="resultado">Se agrego el empleado correactamente</span>';
} else {
    echo '<span id="resultado">No se agrego el empleado</span>';
}
    