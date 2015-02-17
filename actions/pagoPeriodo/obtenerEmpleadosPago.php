<?php

include '../../business/pagoPeriodoBusiness.php';

//comunicacion con Business
$pagoPeriodoBusiness = new pagoPeriodoBusiness();
$listaEmpleados = $pagoPeriodoBusiness->obtenerEmpleadosPago();

echo '<SELECT name="cbxEmpleadoPago" id="cbxEmpleadoPago" size=1>';
echo '<option value=0>Eliga un Empleado</option>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;
    
    echo '<option value=' . $idEmpleado . '>' . $nombreEmpleado . '</option>';
}



