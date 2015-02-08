<?php

include '../../business/clienteBusiness.php';

//comunicacion con Business
$clienteBusiness = new clienteBusiness();
$listaCliente = $clienteBusiness->obtenerCliente();

echo '<SELECT onChange="cargarCliente();obtenerTelefonosCliente()" NAME="cbxCliente" id="cbxCliente" SIZE=1>';
echo '<option value=0>Elija un Cliente</option>';

foreach ($listaCliente as $currentCliente) {

    echo '<option value=' . $currentCliente->idCliente . '>' . $currentCliente->nombreCliente . "  " .
            $currentCliente->primerApellido . "  " . $currentCliente->segundoApellido . '</option>';
}

echo '</select>';