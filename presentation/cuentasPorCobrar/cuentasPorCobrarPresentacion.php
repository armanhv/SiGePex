<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SiGePex</title>     
        <script type="text/javascript" src="../../js/ajaxCuentasPorCobrar.js"></script> 
        <script type="text/javascript" src="../../js/ajaxCliente.js"></script> 
        <script type="text/javascript" src="../../js/jquery-2-1-3.js"></script> 
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>    
    </head>

    <body style="" onload="obtenerClientesCuentas();
            obtenerEmpleadosCuentaCobrar();
            ">
        <div style="margin-left: 500px">
            <p><font size=6>Módulo Cuentas por Cobrar</font></p>

            <div id="tablaCuentasPorCobrar">
                <input type="button" value="Limpiar Campos" onclick="limpiarCamposCuentasPorCobrar()"><br><br>
                <table>
                    <label for="Empleado">Empleado:</label>&nbsp;&nbsp;
                    <span id="empleados"></span><br><br>
                    <label for="cliente">Cliente:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span id="clientes"></span><br><br>

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
            </div>
            <br>
            <span id="resultado"></span>
            <span id="cuentasPorCobrar"></span><br>


        </div>
    </body>
</html>
