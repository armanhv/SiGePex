<?php

include '../../business/clienteBusiness.php';
$idCliente = $_POST['idCliente'];


//instancia de business
$clienteBusiness = new clienteBusiness();


//se elimina
$result = $clienteBusiness->eliminarCliente($idCliente);

if ($result) {
    echo 'El cliente se ingreso correctamente';
} else {
    echo 'Error al ingresar el cliente';
}