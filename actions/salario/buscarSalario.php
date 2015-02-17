<?php
include '../../business/salarioBusiness.php';

$idSalario = $_POST['idSalario'];

$salarioBusiness = new salarioBusiness();

$stringSalario = $salarioBusiness->obtenerSalarios();

return $stringSalario;
