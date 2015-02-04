<?php

include '../../business/clienteBusiness.php';

$clienteBusines = new clienteBusines();

$cliente = $clienteBusines->buscarCliente($_POST['id']);

header("Content-type: text/x-json");

echo json_encode($cliente);

exit();

?>