<?php

include '../../business/telefonoBusiness.php';

$identificacionEmpleadoTelefono = $_POST['identificacionEmpleadoTelefono'];
$numeroTelefono = $_POST['numeroTelefono'];
//comunucacion con Business
$telefonoBusiness = new telefonoBusiness();
//se crea una instancia de cuenta
$objTelefono = new telefono(0, $identificacionEmpleadoTelefono, $numeroTelefono);
//se inserta la cuenta
$result = $telefonoBusiness->insertarTelefono($objTelefono);

if ($result) {

    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha insertado correctamente el tel&#233fono</p></div>';
} else {

    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha insertado el tel&#233fono</p></div>';
}
       