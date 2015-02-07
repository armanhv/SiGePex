<?php

include '../../business/clienteBusiness.php';

//comunicacion con Business
$clienteBusiness = new clienteBusiness();
$listaCliente = $clienteBusiness->obtenerClientesMorosos();

echo '<SELECT NAME="cbxCliente" id="cbxCliente" SIZE=1>';
echo '<option value="0">Seleccione un Cliente</option>';
echo 'aqui';

foreach ($listaCliente as $currentCliente) {

    $nombre = $currentCliente->nombreCliente . " " . $currentCliente->primerApellido . " " . $currentCliente->segundoApellido;
    echo '<option value=' . $currentCliente->idCliente . '>' . $nombre . '</option>';
}

echo '</select>';

