<?php
include '../../business/ingresosBusiness.php';

$idIngresos = $_POST['idIngresos'];

$ingresosBusiness = new ingresosBusiness();

$stringIngresos = $ingresosBusiness->buscarIngresos($idIngresos);

return $stringIngresos;
?>
