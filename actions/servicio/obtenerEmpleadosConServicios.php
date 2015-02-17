<?php

include '../../business/servicioBusiness.php';

//comunicacion con Business
$servicioBusines= new servicioBusines();
$listaEmpleados = $servicioBusines->obtenerEmpleadosConServicios();

echo '<SELECT onChange="cargarServiciosEmpleado();" name="cbxEmpleadoConServicio" id="cbxEmpleadoConServicio" size=1>';
echo '<option value="0">Eliga un Empleado</option>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;
    
    echo '<option value=' . $idEmpleado . '>' . $nombreEmpleado . '</option>';
}



