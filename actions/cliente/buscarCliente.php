<?php

include '../../business/clienteBusiness.php';

$idCliente = $_POST['idCliente'];


//instancia de business
$clienteBusiness = new clienteBusiness();


$stringCliente = $clienteBusiness->buscarCliente($idCliente);

return $stringCliente;
?>
