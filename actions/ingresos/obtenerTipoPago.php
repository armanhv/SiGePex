<?php

include '../../business/ingresosBusiness.php';


$ingresosBusiness=new ingresosBusiness();
$listaTipoPago=$ingresosBusiness->obtenerTipoPago();

echo '<SELECT onChange="cambiarDisplay()" name="cbxTipoPago" id="cbxTipoPago" size=1>';
echo '<option value="0">Elija un Tipo de Pago</option>';

foreach($listaTipoPago as $currentTipo){
	
	$idTipoPago = $currentTipo->idTipoPago;
    $nombreTipo = $currentTipo->nombreTipo;
    
    echo '<option value=' . $idTipoPago . '>' . $nombreTipo . '</option>';
}
	echo '/SELECT>';


