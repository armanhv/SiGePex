<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>RapiServicios</title>     
        <script type="text/javascript" src="../../js/ajaxPagoPeriodo.js"></script>    
        <script type="text/javascript" src="../../js/jquery.js"></script> 
        
        <script type="text/javascript" src="../../js/validacion/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery-ui.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery.formatCurrency.js"></script>
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>
        <link rel="stylesheet" href="../../js/validacion/jquery-ui.css">
    </head>

    <body style="" onload="obtenerEmpleadosPago();obtenerPagos();moneda()">
        <div style="margin-left: 340px">
            <p>Módulo Pago por Periodos</p>

            <div id="tablaPago">
                <table>
                    <tr>
                        <td><label for="Empleado">Eliga un Empleado:</label></td>
                        <td><span id="empleados"></span></td>
                    </tr>
                    <tr>
                        <td><label for="fechaInicio">Fecha de Inicio:</label></td>
                        <td><input type="text" id="txtFechaInicio" name="txtFechaInicio"></td>
                    </tr>
                    <tr>
                        <td><label for="fechaFinal">Fecha Final:</label></td>
                        <td><input type="text" id="txtFechaFinal" name="txtFechaFinal"></td>
                    </tr>
                    <tr>
                        <td><label for="salarioBasePeriodo">Salario Base del Periodo:</label></td>
                        <td><input type="text" id="txtSalarioBasePeriodo" name="txtSalarioBasePeriodo" class="currency"></td>
                    </tr>
                    <tr>
                        <td><label for="montoHorasExtra">Monto por Horas Extra:</label></td>
                        <td><input type="text" id="txtHorasExtrasPeriodo" name="txtHorasExtrasPeriodo" class="currency"></td>
                    </tr>
                    <tr>
                        <td><label for="rebajos">Rebajos:</label></td>
                        <td><input type="text" id="txtRebajos" name="txtRebajos" class="currency"></td>
                    </tr>
                    <tr>
                        <td><label for="descripcionRebajo">Descripción de la rebajo:</label></td>
                        <td><textarea rows="4" cols="22" value="" id="txtDescripcionRebajo"></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="button" value="Insertar" onclick="insertarPago()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Modificar" onclick="actualizarPago()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Eliminar" onclick="borrarPago()">&nbsp;&nbsp;</td>
                    </tr>
                </table>

            </div>
            <br>
            <span id="resultado"></span><br>

            <div id="listaPagos" >

            </div>

        </div>
    </body>
</html>

<!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
<script type="text/JavaScript">
    
    $("#txtFechaInicio").datepicker();
    $("#txtFechaFinal").datepicker();
    datePickerLatino();

</script>
