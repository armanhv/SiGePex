<?php
include '../../business/autorizadoCreditoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idAutorizadoCredito = $_POST['idAutorizadoCredito'];

//comunucacion con Business
$autorizadoCreditoBusiness = new autorizadoCreditoBusiness();

$stringAutorizadoCredito= $autorizadoCreditoBusiness->buscarAutorizadoCredito($idAutorizadoCredito);

return $stringAutorizadoCredito;
?>
