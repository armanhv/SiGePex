<?php

include '../../business/empleadoBusiness.php';

//comunicacion con Business
$salarioBusines = new EmpleadoBusiness();
$listaEmpleados = $salarioBusines->obtenerEmpleados();

echo '<SELECT onChange="cargarServiciosEmpleado();" name="cbxEmpleadoSalario" id="cbxEmpleadoSalario" size=1>';
echo '<option value="0">Eliga un Empleado</option>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;
    
    echo '<option value=' . $idEmpleado . '>' . $nombreEmpleado . '</option>';
}



