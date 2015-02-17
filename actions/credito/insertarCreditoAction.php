<?php

include '../../business/creditoBusiness.php';

$idCliente = $_POST['idCliente'];
$montoLimite = $_POST['montoLimite'];
$fechaPagoLimite = $_POST['fechaPagoLimite'];

$montoLimite = str_replace(".", "", $montoLimite);
$montoLimite = str_replace(",", ".", $montoLimite);
$montoLimite = str_replace("₡", "", $montoLimite);

//comunucacion con Business
$creditoBusiness = new creditoBusiness();
//se crea una instancia de cuenta
$objCredito = new credito(0, $idCliente, $montoLimite, $fechaPagoLimite);
//se inserta la cuenta
$resultado = $creditoBusiness->insertarCredito($objCredito);

if ($resultado) {

    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha insertado correctamente el credito</p></div>';
} else {

    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha insertado el credito</p></div>';
}
       