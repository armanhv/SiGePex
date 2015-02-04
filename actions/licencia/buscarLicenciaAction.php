<?php

include '../../business/licenciaBusiness.php';
$licenciaBusiness = new licenciaBusiness();
$resultado = $licenciaBusiness->buscarLicencia($_POST['id']);
header("Content-type: text/x-json");
echo json_encode($resultado);
exit();
?>