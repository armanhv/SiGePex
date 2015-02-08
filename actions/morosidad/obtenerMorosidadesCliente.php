<?php

include '../../business/morosidadBusiness.php';
$idCliente= $_POST['idCliente'];

if ($idCliente != 0) {
    //comunicacion con Business
    $morosidadBusiness = new morosidadBusiness();
    $listaMorosidadesCliente = $morosidadBusiness->obtenerMorosidadesCliente($idCliente);

echo '<SELECT onClick="cargarMorosidad()" NAME="cbxMorosidad" id="cbxMorosidad" SIZE=1>';
echo '<option value=0>Elija un monto de morosidad</option>';

foreach ($listaMorosidadesCliente as $currentMorosidad) {

    $idMorosidad = $currentMorosidad->idMorosidad;
    $monto = $currentMorosidad->monto;  
    
    echo '<option value=' . $idMorosidad . '>'. $monto .'</option>';
}

}