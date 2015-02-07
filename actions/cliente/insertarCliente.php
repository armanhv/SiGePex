<?php

include '../../business/clienteBusiness.php';

//los valores almacenados que se enviaron por el adm

$nombreCliente = $_POST['nombreCliente'];
$primerApellido = $_POST['primerApellido'];
$segundoApellido = $_POST['segundoApellido'];
$direccion = $_POST['direccion'];
//comunucacion con Business
$clienteBusiness = new clienteBusiness();


$newCliente = new cliente(0, $nombreCliente, $primerApellido, $segundoApellido, $direccion);

//echo $idEmpleado . ' - ' . $nombreBanco . ' - ' . $numeroCuenta . ' - ' . $tipoCuenta . ' - ' . $numeroSimpe;


$result = $clienteBusiness->insertarCliente($newCliente);

if ($result) {
    echo '<span class="correcto">Cliente ingresar correctamente</span>';
} else {
    echo '<span class="incorrecto">Error al ingresar el cliente</span>';
}
