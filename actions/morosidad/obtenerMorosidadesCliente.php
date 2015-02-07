<?php

include '../../business/morosidadBusiness.php';

$listaMorosidadesCliente = $morosidadBusiness->obtenerMorosidadesCliente();

$idEmpleado = $_POST['idEmpleado'];

if ($idEmpleado != 0) {
    //comunicacion con Business
    $morosidadBusiness = new morosidadBusiness();
    $listaMorosidadesCliente = $morosidadBusiness->buscarMorosidad($idEmpleado);

echo '<SELECT onClick="cargarMorosidad()" NAME="cbxMorosidad" id="cbxMorosidad" SIZE=1>';
echo '<option value=0>Elija un monto de morosidad</option>';

foreach ($listaMorosidadesCliente as $currentMorosidad) {

    $idMorosidad = $currentMorosidad->idMorosidad;
    $monto = $currentMorosidad->monto;  
    
    echo '<option value=' . $idMorosidad . '>'. $monto .'</option>';
}

}