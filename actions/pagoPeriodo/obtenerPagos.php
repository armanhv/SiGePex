<?php

include '../../business/pagoPeriodoBusiness.php';

//comunicacion con Business
$pagoBusiness = new pagoPeriodoBusiness();
$listaPagos = $pagoBusiness->obtenerPagos();

echo '<SELECT onChange="cargarPagos();" name="cbxPagos" id="cbxPagos" size=1>';
echo '<option value=0>Eliga un Empleado</option>';

foreach ($listaPagos as $currentPago) {

    $idPago = $currentPago->idPagoPeriodo;
    $idEmpleado = $currentPago->idEmpleado;
   
    //se busca el empleado para obtener el nombre
    $empleado = $pagoBusiness->buscarEmpleadoPago($idEmpleado);
    $nombreEmpleado = $empleado->nombreEmpleado . " " . $empleado->primerApellidoEmpleado . " " . $empleado->segundoApellidoEmpleado;

    echo '<option value=' . $idPago . '>' . $nombreEmpleado . '</option>';
}