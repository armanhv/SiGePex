<?php

include '../../business/empleadoBusiness.php';

//comunicacion con Business
$bancoBusiness = new EmpleadoBusiness();
$listaEmpleados = $bancoBusiness->obtenerEmpleados();
echo '<SELECT onClick="buscarEmpleado();obtenerTelefonosEmpleado();obtenerLicenciasEmpleado();" NAME="cbxEmpleado" id="cbxEmpleado" SIZE=1>';
echo '<option value=0>Seleccione un empleado</option>';
foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $idCedula = $currentEmpleado->cedulaEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado;
    $primerApellido = $currentEmpleado->primerApellidoEmpleado;
    echo '<option value=' . $idEmpleado . '>' . $idCedula . ' - ' . $nombreEmpleado . ' - ' . $primerApellido . '</option>';
}




