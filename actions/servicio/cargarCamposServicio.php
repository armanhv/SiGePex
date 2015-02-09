<?php

include '../../business/servicioBusiness.php';
include '../../business/empleadoBusiness.php';
include '../../business/clienteBusiness.php';
include '../../business/tipoServicioBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idServicio = $_POST['idServicio'];

//comunucacion con Business
$servicioBusiness = new servicioBusines();
$empleadoBusiness = new EmpleadoBusiness();
$clienteBusiness = new clienteBusiness();
$tipoServicioBusines = new tipoServicioBusines();


$servicio = $servicioBusiness->buscarServicio($idServicio);
$listaEmpleados = $empleadoBusiness->obtenerEmpleados();
$listaCliente = $clienteBusiness->obtenerCliente();
$listaTipoServicios = $tipoServicioBusines->obtenerTipoServicios();

//se pasa la fecha a otro formato
if ($servicio->fechaServicio != "") {
    $fechaServicio = split("-", $servicio->fechaServicio);
    $fechaServicio = $fechaServicio[2] . "/" . $fechaServicio[1] . "/" . $fechaServicio[0];
} else {
    $fechaServicio = "";
}
echo '
    <table>
        <tr>
            <td><label for="Cliente">Cliente:</label></td>
            <td>';

echo '<SELECT NAME="cbxCliente" id="cbxCliente" SIZE=1>';
echo '<option value="0">Elija un Cliente</option>';

foreach ($listaCliente as $currentCliente) {

    $nombre = $currentCliente->nombreCliente . " " . $currentCliente->primerApellido . " " . $currentCliente->segundoApellido;

    if ($servicio->idCliente == $currentCliente->idCliente) {
        echo '<option value="' . $currentCliente->idCliente . '" selected>' . $nombre . '</option>';
    } else {
        echo '<option value="' . $currentCliente->idCliente . '">' . $nombre . '</option>';
    }
}
echo '</select>';

echo '</td>
        </tr>
        <tr>
            <td><label for="empleados">Empleado:</label></td>
            <td>';

echo '<SELECT  name="cbxEmpleadoSalario" id="cbxEmpleadoSalario" size=1>';
echo '<option value="0">Elija un Empleado</option>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;

    if ($servicio->idEmpleado == $currentEmpleado->idEmpleado) {
        echo '<option value="' . $idEmpleado . '" selected>' . $nombreEmpleado . '</option>';
    } else {
        echo '<option value="' . $idEmpleado . '">' . $nombreEmpleado . '</option>';
    }
}
echo '</select>';

echo '</td>
        </tr>
        <tr>
            <td><label for="tipoServicio">Elija un Tipo de Servicio:</label></td>
            <td>';

echo '<SELECT name="cbxTipoServicios" onchange="mostrarTotal();" id="cbxTipoServicios" size=1>';
echo '<option value="0">Elija un Tipo de Servicio</option>';


foreach ($listaTipoServicios as $currentTipo) {

    $idTipoPago = $currentTipo->idTipoServicio;
    $nombreTipo = $currentTipo->nombreTipoServicio;

    if ($servicio->idTipoServicio == $currentTipo->idTipoServicio) {
        echo '<option value="' . $idTipoPago . '" selected>' . $nombreTipo . '</option>';
    } else {
        echo '<option value="' . $idTipoPago . '">' . $nombreTipo . '</option>';
    }
}
echo '</SELECT>';

echo '</td>
        </tr>
        <tr>
            <td><label for="fechaServicio">Fecha del Servicio:</label></td>
            <td><input type="text" value="' . $fechaServicio . '" name="txtFechaServicio" id="txtFechaServicio"></td>
        </tr>
        <tr>
            <td><label for="formaPago">Forma de Pago:</label></td>
            <td><select name="cbxFormaPago" id="cbxFormaPago" >
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Efectivo" selected>Efectivo</option>
                    <option value="Crédito">Crédito</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="cargosExtra">Cargos Extra:</label></td>
            <td><input type="text" id="txtCargosExtra" name="txtCargosExtra" value="' . $servicio->cargosExtra . '"class="currency" onchange="mostrarTotal();"></td>
        </tr>
        <tr>
            <td><label for="descripcionServicio">Descripción del Servicio:</label></td>
            <td><textarea rows="4" cols="22" value="" id="txtDescripcionServicio">' . $servicio->descripcionServicio . '</textarea></td>
        </tr>
        <tr>
            <td><label for="montoTotal">Total a Pagar:</label></td>
            <td><span id="montoTotal">₡ ' . $servicio->total . '</span></td>
        </tr>
        <tr>
            <td><input type="button" value="Insertar" onclick="insertarServicio()"></td>
            <td><input type="button" value="Actualizar" onclick="actualizarServicio()"></td>
            <td><input type="button" value="Borrar" onclick="borrarServicio()"></td>
        </tr>
    </table>

     <!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
    <script type="text/JavaScript">
        $("#txtFechaServicio").datepicker();
        datePickerLatino();
    </script>
    
    <script>
        $(document).ready(function () {
            $(".currency").blur(function () {
                $(".currency").formatCurrency();
            });
        });
    </script>';
