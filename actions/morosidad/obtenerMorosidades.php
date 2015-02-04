<?php

include '../../business/morosidadBusiness.php';

//comunicacion con Business
$morosidadBusiness = new morosidadBusiness();
$listaMorosidad = $morosidadBusiness->obtenerMorosidades();

echo '<SELECT onClick="cargarMorosidad()" NAME="cbxMorosidad" id="cbxMorosidad" SIZE=1>';
echo '<option value=0>Elija un monto de morosidad</option>';
echo '$fechaMorosidad';

foreach ($listaMorosidad as $currentMorosidad) {

    $idMorosidad = $currentMorosidad->idMorosidad;
    $monto = $currentMorosidad->monto;  
    
    echo '<option value=' . $idMorosidad . '>'. $monto .'</option>';
}

