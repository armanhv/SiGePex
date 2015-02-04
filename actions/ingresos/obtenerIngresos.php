<?php

include '../../business/ingresosBusiness.php';

$ingresosBusiness = new ingresosBusiness();
$listaBusiness = $ingresosBusiness->obtenerIngresos();

echo '<SELECT onChange="cargarIngresos();" name="cbxIngresos" id="cbxIngresos" size=1>';
echo '<option value="0">Ingresos hasta el momento</option>';

foreach ($listaBusiness as $currentIngreso) {

    $idIngresos = $currentIngreso->idIngresos;
    $nombreIngreso = $currentIngreso->fechaIngreso . " - " . $currentIngreso->numBoucher;
    
    echo '<option value=' . $idIngresos . '>' . $nombreIngreso . '</option>';
}


