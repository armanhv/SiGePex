<?php

include_once '../../business/autorizadoCreditoBusiness.php';

$autorizadoCreditoBusiness = new autorizadoCreditoBusiness();
    
$autorizadoCredito = $autorizadoCreditoBusiness->buscarCliente($_POST['id']);
header("Content-type: text/x-json");
echo json_encode($autorizadoCredito);

//autorizadoCredito
exit();
?>