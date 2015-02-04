<?php

include '../../business/empleadoBusiness.php';

//comunicacion con Business
$licenciaBusiness = new EmpleadoBusiness();
$listaEmpleados = $licenciaBusiness->obtenerEmpleados();

echo '<SELECT  onChange="obtenerHorarios();" name="cbxEmpleado" id="cbxEmpleado" size=1>';
echo '<option value="0">Eliga un Empleado</option>';

foreach ($listaEmpleados as $currentEmpleado) {
    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " .
            $currentEmpleado->primerApellidoEmpleado . " " .
            $currentEmpleado->segundoApellidoEmpleado;

    echo '<option value=' . $idEmpleado . '>' . $nombreEmpleado . '</option>';
}
