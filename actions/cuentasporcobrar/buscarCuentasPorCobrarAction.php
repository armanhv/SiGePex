<?php

include '../../business/cuentasPorCobrarBusiness.php';

$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();

$resultado = $cuentasPorCobrarBusiness->buscarCuentasPorCobrar($_POST['id']);

header("Content-type: text/x-json");

echo json_encode($resultado);
exit();
?>

