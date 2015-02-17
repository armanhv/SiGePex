<?php
include '../../business/direccionClienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idDireccion = $_POST['$idDireccion'];

//comunucacion con Business
$direccionClienteBusiness = new direccionClienteBusiness();

$stringDireccionCliente = $direccionClienteBusiness->buscarDireccionCliente($idDireccion);

return $stringDireccionCliente;
?>
