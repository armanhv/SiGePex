<?php

include '../../business/morosidadBusiness.php';
include '../../business/clienteBusiness.php';
include_once '../../business/empleadoBusiness.php';


//los valores almacenados que se enviarion por el cliente
$idCuentasPorCobrar = $_POST['idCuentasPorCobrar'];

$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();
$clienteBusiness = new clienteBusiness();
$empleadoBusiness = new EmpleadoBusiness();

$cuentasPorCobrar = $cuentasPorCobrarBusiness->buscarCuentasPorCobrar($idCuentasPorCobrar);

$listaEmpleados = $empleadoBusiness->obtenerEmpleados();

$listaCliente = $clienteBusiness->obtenerClientes();


echo '
    <table>
        <tr>
            <td><label for="Empleado">Empleado:</label></td>
            <td>';

echo '<SELECT  name="cbxEmpleadoCuenta" id="cbxEmpleadoCuenta" size=1>';
echo '<option value="0">Seleccione un Empleado</option>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;

    if ($cuentasPorCobrar->idEmpleado == $currentEmpleado->idEmpleado) {
        echo '<option value="' . $idEmpleado . '" selected>' . $nombreEmpleado . '</option>';
    } else {
        echo '<option value="' . $idEmpleado . '">' . $nombreEmpleado . '</option>';
    }
}



echo '
    <table>
        <tr>
            <td><label for="cliente">Cliente:</label></td>
            <td>';

echo '<SELECT  name="cbxClienteMoroso" id="cbxClienteMoroso" size=1>';
echo '<option value="0">Seleccione un Cliente</option>';

foreach ($listaCliente as $currentCliente) {

    $idCliente = $currentCliente->idCliente;
    $nombreCliente = $currentCliente->nombreCliente . " " . $currentCliente->primerApellido . " " . $currentCliente->segundoApellido;

    if ($cuentasPorCobrar->idMorosidad == $currentCliente->idCliente) {
        echo '<option value="' . $idCliente . '" selected>' . $nombreCliente . '</option>';
    } else {
        echo '<option value="' . $idCliente . '">' . $nombreCliente . '</option>';
    }
}

echo '</select>';

