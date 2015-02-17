<?php

include '../../business/salarioBusiness.php';

//comunicacion con Business
$salarioBusiness = new salarioBusiness();
$listaSalarios = $salarioBusiness->obtenerSalarios();

echo '<SELECT onChange="cargarSalarios();recarga();" name="cbxSalarios" id="cbxSalarios" size=1>';
echo '<option value=0>Eliga un Empleado</option>';

foreach ($listaSalarios as $currentSalario) {

    $idSalario = $currentSalario->idSalario;
    $idEmpleado = $currentSalario->idEmpleado;
   
    //se busca el empleado para obtener el nombre
    $empleado = $salarioBusiness->buscarEmpleadoSalario($idEmpleado);
    $nombreEmpleado = $empleado->nombreEmpleado . " " . $empleado->primerApellidoEmpleado . " " . $empleado->segundoApellidoEmpleado;

    echo '<option value=' . $idSalario . '>' . $nombreEmpleado . '</option>';
}