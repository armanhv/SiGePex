<?php

include '../../business/empleadoBusiness.php';
$empleadoBusiness = new empleadoBusiness();

$resultado = $empleadoBusiness->buscarEmpleado($_POST['id']);
header("Content-type: text/x-json");
echo json_encode($resultado);
exit();
?>