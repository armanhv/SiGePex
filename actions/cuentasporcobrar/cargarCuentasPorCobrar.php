<?php

include '../../business/morosidadBusiness.php';
include '../../business/clienteBusiness.php';
include '../../business/empleadoBusiness.php';
include '../../business/cuentasPorCobrarBusiness.php';


//los valores almacenados que se enviarion por el cliente
$idCuentasPorCobrar = $_POST['idCuentasPorCobrar'];

$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();
$clienteBusiness = new clienteBusiness();
$empleadoBusiness = new EmpleadoBusiness();

$cuentasPorCobrar = $cuentasPorCobrarBusiness->buscarCuentasPorCobrar($idCuentasPorCobrar);
$listaEmpleados = $empleadoBusiness->obtenerEmpleados();
$listaCliente = $clienteBusiness->obtenerCliente();

$fecha = split("-", $cuentasPorCobrar->fechaPago);
$fecha = $fecha[2] . "/" . $fecha[1] . "/" . $fecha[0];


echo '
    <table>
        <tr>
            <td><label for="cliente">Cliente:</label></td>
            <td>';

echo '<SELECT onClick="obtenerCuentasPorCobrar()" name="cbxCliente" id="cbxCliente" size=1>';
echo '<option value="0">Seleccione un Cliente</option>';

foreach ($listaCliente as $currentCliente) {

    $idCliente = $currentCliente->idCliente;
    $nombreCliente = $currentCliente->nombreCliente . " " . $currentCliente->primerApellido . " " . $currentCliente->segundoApellido;

    if ($cuentasPorCobrar->idCliente == $currentCliente->idCliente) {
        echo '<option value="' . $idCliente . '" selected>' . $nombreCliente . '</option>';
    } else {
        echo '<option value="' . $idCliente . '">' . $nombreCliente . '</option>';
    }
}
echo '</select>';

echo '</td>
        </tr>
        <tr>
            <td><label for="Empleado">Empleado:</label></td>
            <td>';

echo '<SELECT  name="cbxEmpleado" id="cbxEmpleado" size=1>';
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
echo '</select>';

echo '</td>
        </tr>
        <tr>
            <td><label for="fechaPago">Fecha Pago:</label></td>
            <td><input type="text" value="' . $fecha . '" name="txtFechaPago" id="txtFechaPago"><br></td>
        </tr>

        <tr>
            <td><label for="monto">Monto:</label></td>
            <td><input type="text" value="' . $cuentasPorCobrar->monto . '" name="txtMonto" id="txtMonto" class="currency"><br></td>
        </tr>

        <tr>
            <td><input type="button" value="Insertar" onclick="insertarCuentaPorCobrar()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Actualizar" onclick="actualizarCuentaPorCobrar()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Borrar" onclick="borrarCuentaPorCobrar()">&nbsp;&nbsp;</td>
        </tr>

    </table>
    
    <!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
    <script type="text/JavaScript">

        $("#txtFechaPago").datepicker();
        datePickerLatino();

    </script>
    
  <script type="text/JavaScript">
    $(document).ready(function () {
            $(".currency").blur(function () {
                $(".currency").formatCurrency();
            });
        });
  </script>
';


