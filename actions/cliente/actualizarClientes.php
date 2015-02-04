<?php

include '../../business/clienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idCliente = $_POST['idCliente'];
$nombreCliente = $_POST['nombreCliente'];
$primerApellido = $_POST['primerApellido'];
$segundoApellido = $_POST['segundoApellido'];
$direccion = $_POST['direccion'];

//comunucacion con Business
$clienteBusiness = new clienteBusiness();

//se crea una instancia de cliente
$newCliente = new cliente($idCliente, $nombreCliente, $primerApellido, $segundoApellido, $direccion);

//se actualiza
$result = $clienteBusiness->actualizarCliente($newCliente);

if ($result) {
    echo '<span class="correcto"> El cliente se modificó correctamente</span>';
} else {
    echo '<span class="incorrecto">Error al modificar el cliente</span>';
}
