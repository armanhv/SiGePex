<?php
include '../../business/creditoBusiness.php';

$idCredito = $_POST['idCredito'];

$creditoBusiness = new creditoBusiness();

$stringCredito = $creditoBusiness->buscarCredito($idCredito);

return $stringCredito;
?>
