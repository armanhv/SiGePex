<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SiGePex</title>     
        <script type="text/javascript" src="../../js/ajaxIngresos.js"></script>    
        <script type="text/javascript" src="../../js/jquery.js"></script>   

        <script type="text/javascript" src="../../js/validacion/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery-ui.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery.formatCurrency.js"></script>
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>
        <link rel="stylesheet" href="../../js/validacion/jquery-ui.css">

    </head>

    <body style="" onload="obtenerEmpleadosIngresos();
            obtenerClientesIngresos();
            obtenerTipoPago();
            obtenerIngresos();
            moneda();">

        <div style="margin-left: 500px">
            <p>M&oacute;dulo Ingresos</font></p>
            <div id="tablaIngresos">
                <table>
                    <tr>
                        <td><label for="empleados">Empleado:</label></td>
                        <td><div id="empleados"></div></td>
                    </tr>
                    <tr>
                        <td><label for="Cliente">Cliente:</label></td>
                        <td><span id="clientes"></span></td>
                    </tr>
                    <tr>
                        <td><label for="tipoPago">Elija un Tipo de Pago:</label></td>
                        <td><span id="tipoPagos"></span></td>
                    </tr>
                    <tr>
                        <td><label for="numBoucher">Numero de Boucher:</label></td>
                        <td><input type="text" value="" name="txtNumBoucher" id="txtNumBoucher"><br></td>
                    </tr>
                    <tr>
                        <td><label for="Monto">Monto:</label></td>
                        <td><input type="text" value="" name="txtMonto" id="txtMonto" class="currency"><br></td>
                    </tr>
                    <tr>
                        <td><label for="fechaIngreso">Fecha de Ingreso:</label></td>
                        <td><input type="text" value="" name="txtFechaIngreso" id="txtFechaIngreso"><br></td>
                    </tr>
                    <tr>
                        <td><input type="button" value="Insertar" onclick="insertarIngresos()"></td>
                        <td><input type="button" value="Actualizar" onclick="actualizarIngresos()"></td>
                        <td><input type="button" value="Borrar" onclick="borrarIngresos()"></td>
                    </tr>
                </table>
            </div>
            <br>
            <span id="resultado"></span>

            <br>

            <label for="Ingresos">Ingresos:</label>
            <span id="ingresos"></span><br>

        </div>
    </body>
</html>

<!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
<script type="text/JavaScript">

    $("#txtFechaIngreso").datepicker();
    datePickerLatino();

</script>
