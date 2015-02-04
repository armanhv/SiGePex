<?php

include '../../business/clienteBusiness.php';

//comunicacion con Business
$clienteBusiness = new ClienteBusiness();
$listaClientes = $clienteBusiness->obtenerClientes();
echo '<SELECT onClick="buscarCliente();" NAME="cbxCliente" id="cbxCliente" SIZE=1>';
echo '<option value=0>Seleccione un cliente</option>';
foreach ($listaClientes as $currentCliente) {

    $idCliente = $currentCliente->idCliente;
    $nombreCliente = $currentCliente->nombreCliente . " " . $currentCliente->primerApellido . " " . $currentCliente->segundoApellido;

    echo '<option value=' . $idCliente  . '>' . $nombreCliente .'</option>';
}



