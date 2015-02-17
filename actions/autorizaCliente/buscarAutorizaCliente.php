<?php
include '../../business/autorizaClienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idAutorizacionCliente = $_POST['idAutorizacionCliente'];

//comunucacion con Business
$autorizaClienteBusiness = new autorizaClienteBusiness();

$stringAutorizaCliente = $autorizaClienteBusiness->buscarAutorizaCliente($idAutorizacionCliente);

return $stringAutorizaCliente;
?>
