<?php
include '../../business/rolBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idRol =$_POST['idRol'];
$nombreRol = $_POST['nombreRol'];

//comunicacion con business
$rolBusiness = new rolBusiness();

//intancina de horario
$rol = new rol($idRol, $nombreRol);

//se actualiza
$empleado = $rolBusiness->updateRol($rol);

if ($empleado) {
    echo 'Se actualizo corectamente.';
}else {
    echo 'Error al actualizar.';
}