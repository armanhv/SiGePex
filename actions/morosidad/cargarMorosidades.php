<?php

include '../../business/morosidadBusiness.php';
include '../../business/clienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idMorosidad = $_POST['idMorosidad'];

$morosidadBusiness = new morosidadBusiness(); //comunucacion con Business

$clienteBusiness = new clienteBusiness();

$morosidad = $morosidadBusiness->buscarMorosidades($idMorosidad);

$listaCliente = $clienteBusiness->obtenerCliente();

echo '
    <table>
        <tr>
            <td><label for="cliente">Cliente:</label></td>
            <td>';

echo '<SELECT  name="cbxCliente" id="cbxCliente" size=1>';
echo '<option value="0">Elija un Cliente</option>';

foreach ($listaCliente as $currentCliente) {

    $idCliente = $currentCliente->idCliente;
    $nombreCliente = $currentCliente->nombreCliente . " " . $currentCliente->primerApellido . " " . $currentCliente->segundoApellido;

    if ($morosidad->idMorosidad == $currentCliente->idCliente) {
        echo '<option value="' . $idCliente . '" selected>' . $nombreCliente . '</option>';
    } else {
        echo '<option value="' . $idCliente . '">' . $nombreCliente . '</option>';
    }
}

echo '</select>';

