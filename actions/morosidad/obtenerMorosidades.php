<?php

include '../../business/morosidadBusiness.php';

//comunicacion con Business
$morosidadBusiness = new morosidadBusiness();
$morosidad = $morosidadBusiness->obtenerMorosidades();

echo '<SELECT onClick="buscarMorosidad()" NAME="cbxMorosidad" id="cbxMorosidad" SIZE=1>';
echo '<option value=0>Elija un monto de morosidad</option>';

foreach ($morosidad as $currentMorosidad) {

    $idMorosidad = $currentMorosidad->idMorosidad;
    $monto = $currentMorosidad->monto;  
    
    echo '<option value=' . $idMorosidad . '>'. $monto .'</option>';
}

