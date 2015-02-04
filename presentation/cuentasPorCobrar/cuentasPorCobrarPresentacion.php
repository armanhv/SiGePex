<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SiGePex</title>     
        <script type="text/javascript" src="../../js/ajaxCuentasPorCobrar.js"></script> 
        <script type="text/javascript" src="../../js/ajaxEmpleado.js"></script> 
        <script type="text/javascript" src="../../js/ajaxCliente.js"></script> 
        <script type="text/javascript" src="../../js/jquery.js"></script>    
    </head>

    <body style="" onload="obtenerCuentasPorCobrar();
            obtenerEmpleados(); obtenerClientes()">
        <div style="margin-left: 500px"><br><br>
            <p><font size=6>Módulo Cuentas por Cobrar</font></p><br><br>

            <label for="empleados">Empleado:</label>
            <div id="listaEmpleados"></div><br>
            <label for="clientes">Cliente:</label>
            <div id="cliente"></div><br>

<!--            <div id="tablaCuentasPorCobrar">-->
                <table>

                    <tr>
                        <td><label for="fechaPago">Fecha Pago:</label></td>
                        <td><input type="text" value="" name="txtFechaPago" id="txtFechaPago"><br></td>
                    </tr>

                    <tr>
                        <td><label for="monto">Monto:</label></td>
                        <td><input type="text" value="" name="txtMonto" id="txtMonto"><br></td>
                    </tr>

                    <tr>
                        <td><input type="button" value="Insertar" onclick="insertarCuentaPorCobrar()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Actualizar" onclick="actualizarCuentaPorCobrar()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Borrar" onclick="borrarCuentaPorCobrar()">&nbsp;&nbsp;</td>
                    </tr>
                </table>
            <!--</div>-->
            <br>
            <span id="resultado"></span>

            <label for="CuentasPorCobrar">Cuentas Por Cobrar:</label>
            <span id="cuentasPorCobrar"></span><br>


        </div>
    </body>
</html>
