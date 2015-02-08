<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SiGePex</title>     
        <script type="text/javascript" src="../../js/ajaxCuentasPorCobrar.js"></script> 
        <script type="text/javascript" src="../../js/ajaxCliente.js"></script> 
        <script type="text/javascript" src="../../js/jquery.js"></script> 
        <script type="text/javascript" src="../../js/jquery-2-1-3.js"></script> 

        <script type="text/javascript" src="../../js/validacion/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery-ui.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery.formatCurrency.js"></script>
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>
        <link rel="stylesheet" href="../../js/validacion/jquery-ui.css">

    </head>

    <body style="" onload="obtenerClientesCuentas();
            obtenerEmpleadosCuentaCobrar();
            moneda();">
        <div style="margin-left: 500px">
            <p><font size=6>Módulo Cuentas por Cobrar</font></p>

            <input type="button" value="Limpiar Campos" onclick="limpiarCamposCuentas();obtenerCuentasPorCobrar();"><br><br>
            <div id="tablaCuentasPorCobrar">
                <table>
                    <tr>
                        <td><label for="cliente">Cliente:</label></td>
                        <td><span id="clientes"></span></td>
                    </tr>
                    <tr>
                        <td><label for="Empleado">Empleado:</label></td>
                        <td><span id="empleados"></span></td>
                    </tr>
                    <tr>
                        <td><label for="fechaPago">Fecha Pago:</label></td>
                        <td><input type="text" value="" name="txtFechaPago" id="txtFechaPago"><br></td>
                    </tr>

                    <tr>
                        <td><label for="monto">Monto:</label></td>
                        <td><input type="text" value="" name="txtMonto" id="txtMonto" class="currency"><br></td>
                    </tr>

                    <tr>
                        <td><input type="button" value="Insertar" onclick="insertarCuentaPorCobrar()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Actualizar" onclick="actualizarCuentaPorCobrar()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Borrar" onclick="borrarCuentaPorCobrar()">&nbsp;&nbsp;</td>
                    </tr>

                </table>
            </div>
            <br>
            <span id="resultado"></span>
            <span id="cuentasPorCobrar"></span><br>


        </div>
    </body>
</html>

<!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
<script type="text/JavaScript">

    $("#txtFechaPago").datepicker();
    datePickerLatino();

</script>
