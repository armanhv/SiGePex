<?php

include '../../business/ingresosBusiness.php';
include '../../business/empleadoBusiness.php';
include '../../business/clienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idIngresos = $_POST['idIngresos'];

$ingresosBusiness = new ingresosBusiness(); //comunucacion con Business
$empleadoBusiness = new EmpleadoBusiness();
$clienteBusiness = new clienteBusiness();

$ingresos = $ingresosBusiness->buscarIngresos($idIngresos);
$listaTipoPago = $ingresosBusiness->obtenerTipoPago();

$listaEmpleados = $empleadoBusiness->obtenerEmpleados();

$listaCliente = $clienteBusiness->obtenerCliente();

$fechaIngreso = split("-", $ingresos->fechaIngreso);
$fechaIngreso = $fechaIngreso[2] . "/" . $fechaIngreso[1] . "/" . $fechaIngreso[0];

echo '
    <table>
        <tr>
            <td><label for="empleados">Empleado:</label></td>
            <td>';

echo '<SELECT  name="cbxEmpleadoIngreso" id="cbxEmpleadoIngreso" size=1>';
echo '<option value="0">Elija un Empleado</option>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;

    if ($ingresos->idEmpleado == $currentEmpleado->idEmpleado) {
        echo '<option value="' . $idEmpleado . '" selected>' . $nombreEmpleado . '</option>';
    } else {
        echo '<option value="' . $idEmpleado . '">' . $nombreEmpleado . '</option>';
    }
}
echo '</select>';

echo '</td>
        </tr>
        <tr>
            <td><label for="Cliente">Cliente:</label></td>
            <td>';

echo '<SELECT NAME="cbxClienteIngreso" id="cbxClienteIngreso" SIZE=1>';
echo '<option value="0">Elija un Cliente</option>';

foreach ($listaCliente as $currentCliente) {

    $nombre = $currentCliente->nombreCliente . " " . $currentCliente->primerApellido . " " . $currentCliente->segundoApellido;

    if ($ingresos->idCliente == $currentCliente->idCliente) {
        echo '<option value="' . $currentCliente->idCliente . '" selected>' . $nombre . '</option>';
    } else {
        echo '<option value="' . $currentCliente->idCliente . '">' . $nombre . '</option>';
    }
}

echo '</select>';

echo '</td>
        </tr>
        <tr>
            <td><label for="tipoPago">Elija un Tipo de Pago:</label></td>
            <td>';

echo '<SELECT name="cbxTipoPago" id="cbxTipoPago" size=1>';
echo '<option value="0">Elija un Tipo de Pago</option>';


foreach ($listaTipoPago as $currentTipo) {

    $idTipoPago = $currentTipo->idTipoPago;
    $nombreTipo = $currentTipo->nombreTipo;

    if ($ingresos->idTipoPago == $currentTipo->idCliente) {
        echo '<option value="' . $idTipoPago . '" selected>' . $nombreTipo . '</option>';
    } else {
        echo '<option value="' . $idTipoPago . '">' . $nombreTipo . '</option>';
    }
}
echo '</SELECT>';

echo '</td>
        </tr>

        <tr>
            <td><label for="numBoucher">numBoucher:</label></td>
            <td><input type="text" value="' . $ingresos->numBoucher . '" name="txtNumBoucher" id="txtNumBoucher"><br></td>
        </tr>

        <tr>
            <td><label for="Monto">Monto:</label></td>
            <td><input type="text" value="' . $ingresos->monto . '" name="txtMonto" id="txtMonto" class="currency"></td>
        </tr>


        <tr>
            <td><label for="fechaIngreso">Fecha de Ingreso:</label></td>
            <td><input type="text" value="' . $fechaIngreso . '" name="txtFechaIngreso" id="txtFechaIngreso"><br></td>
        </tr>

        <tr>
            <td><input type="button" value="Insertar" onclick="insertarIngresos()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Actualizar" onclick="actualizarIngresos()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Borrar" onclick="borrarIngresos()">&nbsp;&nbsp;</td>
        </tr>
    </table>
    
    <!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
    <script type="text/JavaScript">
        $("#txtFechaIngreso").datepicker();
        datePickerLatino();
    </script>

   <script>
        $(document).ready(function () {
            $(".currency").blur(function () {
                $(".currency").formatCurrency();
            });
        });
    </script>

';

