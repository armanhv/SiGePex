
<?php

include '../../business/creditoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idCredito = $_POST['idCredito'];
$idCliente = $_POST['idCliente'];
$montoLimite = $_POST['montoLimite'];
$fechaPagoLimite = $_POST['fechaPagoLimite'];

$montoLimite = str_replace(".", "", $montoLimite);
$montoLimite = str_replace(",", ".", $montoLimite);
$montoLimite = str_replace("₡", "", $montoLimite);

//comunucacion con Business
$creditoBusiness = new creditoBusiness();

//se crea una instancia de cuenta
$objCredito = new credito($idCredito, $idCliente, $montoLimite, $fechaPagoLimite);

//se actualiza
$resultado = $creditoBusiness->actualizarCredito($objCredito);

if ($resultado) {
    echo '<p>Se ha actualizado correctamente el credito</p></div>';
} else {
    echo '<p>No se ha actualizado el credito</p>';
}
         
