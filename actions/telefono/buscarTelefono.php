<?php
include '../../business/telefonoBusiness.php';

$idTelefono = $_POST['idTelefono'];

$telefonoBusiness = new telefonoBusiness();

$stringTelefono = $telefonoBusiness->buscarTelefono($idTelefono);

return $stringTelefono;
?>
