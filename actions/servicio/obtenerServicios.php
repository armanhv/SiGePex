<?php

include '../../business/servicioBusiness.php';
include '../../business/clienteBusiness.php';

//comunicacion con business
$servicioBusines = new servicioBusines();
$clienteBusines = new clienteBusiness();
$listaServicios = $servicioBusines->obtenerServicios();

echo '<SELECT onChange="cargarServicios();" name="cbxServicios" id="cbxServicios" size=1>';
echo '<option value="0">Eliga un Servicio</option>';

foreach ($listaServicios as $currentServicio) {

    $idServicio = $currentServicio->idServicio;
    $idCliente = $currentServicio->idCliente;

    $cliente = $clienteBusines->buscarCliente($idCliente);
    $nombreCliente = $cliente->nombreCliente . " " . $cliente->primerApellido . " " . $cliente->segundoApellido;

    $info = $currentServicio->fechaServicio . " Servicio para: " . $nombreCliente;

    echo '<option value=' . $idServicio . '>' . $info . '</option>';
}

