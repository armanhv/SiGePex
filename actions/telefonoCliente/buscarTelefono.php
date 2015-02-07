<?php
include '../../business/telefonoClienteBusiness.php';

$idTelefono = $_POST['idTelefono'];

$telefonoBusiness = new telefonoClienteBusiness();

$stringTelefono = $telefonoBusiness->buscarTelefono($idTelefono);

return $stringTelefono;
?>
