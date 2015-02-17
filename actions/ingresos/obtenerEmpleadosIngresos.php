<?php

include '../../business/empleadoBusiness.php';

//comunicacion con Business
$empleadoBusiness = new EmpleadoBusiness();
$listaEmpleados = $empleadoBusiness->obtenerEmpleados();

echo '<SELECT  name="cbxEmpleadoIngreso" id="cbxEmpleadoIngreso" size=1>';
echo '<option value="0">Elija un Empleado</option>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;
    
    echo '<option value=' . $idEmpleado . '>' . $nombreEmpleado . '</option>';
}