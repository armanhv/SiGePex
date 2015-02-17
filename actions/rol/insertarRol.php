<?php

include '../../business/rolBusiness.php';

//los valores almacenados que se enviarion por el cliente
$nombreRol = $_POST['nombreRol'];

//comunucacion con Business
$rolBusiness = new rolBusiness();

//se crea una instancia de horario
$newRol = new rol(0, $nombreRol);

//se inserta el horario
$resultado = $rolBusiness->insertRol($newRol);

if ($resultado) {
    echo 'Se inserto correctamente.';
} else {
    echo 'Error al insertar.';
}