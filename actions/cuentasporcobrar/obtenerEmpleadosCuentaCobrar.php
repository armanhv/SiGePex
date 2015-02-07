<?php

include '../../business/empleadoBusiness.php';

//comunicacion con Business
$empleadoBusiness = new EmpleadoBusiness();
$listaEmpleados = $empleadoBusiness->obtenerEmpleadosCuentaCobrar();

echo '<SELECT  name="cbxEmpleadoCuenta" id="cbxEmpleadoCuenta" size=1>';
echo '<option value="0">Seleccione un Empleado</option>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;
    
    echo '<option value=' . $idEmpleado . '>' . $nombreEmpleado . '</option>';
}

