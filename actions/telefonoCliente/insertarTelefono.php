<?php

include '../../business/telefonoClienteBusiness.php';

$idCliente = $_POST['idCliente'];
$numeroTelefono = $_POST['numeroTelefono'];
//comunucacion con Business
$telefonoBusiness = new telefonoClienteBusiness();
//se crea una instancia de cuenta
$objTelefono = new telefonoCliente(0, $idCliente, $numeroTelefono);
//se inserta la cuenta
$result = $telefonoBusiness->insertarTelefono($objTelefono);

if ($result) {

    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha insertado correctamente el tel&#233fono</p></div>';
} else {

    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha insertado el tel&#233fono</p></div>';
}
       