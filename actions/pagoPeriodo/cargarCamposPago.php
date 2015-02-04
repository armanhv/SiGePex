<?php

include '../../business/pagoPeriodoBusiness.php';


//los valores almacenados que se enviarion por el cliente
$idPago = $_POST['idPago'];

$pagoBusines = new pagoPeriodoBusiness(); //comunucacion con Business
$pago = $pagoBusines->buscarPagoPeriodo($idPago);
$listaEmpleados = $pagoBusines->obtenerEmpleadosPago();

//para mostrar la fecha 
$fechaInicio = split("-", $pago->fechaInicioPeriodo);
$fechaInicio = $fechaInicio[2] . "/" . $fechaInicio[1] . "/" . $fechaInicio[0];

$fechaFinal = split("-", $pago->fechaFinPeriodo);
$fechaFinal = $fechaFinal[2] . "/" . $fechaFinal[1] . "/" . $fechaFinal[0];

echo '<table>
        <tr>
            <td><label for="Empleado">Eliga un Empleado:</label></td>      
            <td>
            <SELECT name="cbxEmpleadoPago" id="cbxEmpleadoPago" size=1>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;

    if ($pago->idEmpleado == $currentEmpleado->idEmpleado) {
        echo '<option value="' . $idEmpleado . '" selected>' . $nombreEmpleado . '</option>';
    } else {
        echo '<option value="' . $idEmpleado . '">' . $nombreEmpleado . '</option>';
    }
}

echo '           
            </td>
        </tr>
        <tr>
            <td><label for="fechaInicio">Fecha de Inicio:</label></td>
            <td><input type="text" id="txtFechaInicio" name="txtFechaInicio" value="' . $fechaInicio . '" ></td>
        </tr>
        <tr>
            <td><label for="fechaFinal">Fecha Final:</label></td>
            <td><input type="text" id="txtFechaFinal" name="txtFechaFinal" value="' . $fechaFinal . '"></td>
        </tr>
        <tr>
            <td><label for="salarioBasePeriodo">Salario Base del Periodo:</label></td>
            <td><input type="text" id="txtSalarioBasePeriodo" name="txtSalarioBasePeriodo" value="' . $pago->salarioBasePeriodo . '" class="currency"></td>
        </tr>
        <tr>
            <td><label for="montoHorasExtra">Monto por Horas Extra:</label></td>
            <td><input type="text" id="txtHorasExtrasPeriodo" name="txtHorasExtrasPeriodo" value="' . $pago->montoHorasExtra . '" class="currency"></td>
        </tr>
        <tr>
            <td><label for="rebajos">Rebajos:</label></td>
            <td><input type="text" id="txtRebajos" name="txtRebajos" value="' . $pago->rebajosPeriodo . '" class="currency"></td>
        </tr>
         <tr>
            <td><label for="descripcionRebajo">Descripción de la rebajo:</label></td>
            <td><textarea rows="4" cols="22" value="" id="txtDescripcionRebajo">' . $pago->descripcionRebajo . '</textarea></td>
        </tr>
        <tr>
            <td><input type="button" value="Insertar" onclick="insertarPago()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Modificar" onclick="actualizarPago()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Eliminar" onclick="borrarPago()">&nbsp;&nbsp;</td>
        </tr>
    </table>
    
    <script>
        $(document).ready(function () {
            $(".currency").blur(function () {
                $(".currency").formatCurrency();
            });
        });
    </script>
    
    <script type="text/JavaScript">
        $("#txtFechaInicio").datepicker();
        $("#txtFechaFinal").datepicker();
        datePickerLatino();
    </script>';

