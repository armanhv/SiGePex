<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SiGePex</title>     
        <script type="text/javascript" src="../../js/ajaxIngresos.js"></script>    
        <script type="text/javascript" src="../../js/jquery.js"></script>    
    </head>

    <body style="" onload="obtenerEmpleadosIngresos();obtenerClientesIngresos();obtenerTipoPago();obtenerIngresos();">
        <div style="margin-left: 500px">
            <p>M&oacute;dulo Ingresos</font></p>

            
    		
            <div id="tablaIngresos">
                <table>
					<tr>
					<label for="empleados">Empleado:</label>
					<div id="empleados"></div><br><br>
					</tr>
					<tr>
                    <label for="Cliente">Cliente:</label>
					<span id="clientes"></span><br><br>
					</tr>
					
					<tr>
					<label for="tipoPago">Elija un Tipo de Pago:</label>
					<span id="tipoPagos"></span><br>
					</tr>
					
                    <tr>
                        <td><label for="numBoucher">Numero de Boucher:</label></td>
                        <td><input type="text" value="" name="txtNumBoucher" id="txtNumBoucher"><br></td>
                    </tr>

                    <tr>
                        <td><label for="Monto">Monto:</label></td>
                        <td><input type="text" value="" name="txtMonto" id="txtMonto"><br></td>
                    </tr>

                    <tr>
                        <td><label for="fechaIngreso">Fecha de Ingreso:</label></td>
                        <td><input type="text" value="" name="txtFechaIngreso" id="txtFechaIngreso"><br></td>
                    </tr>
                    
                    <tr>
					
                        <td><input type="button" value="Insertar" onclick="insertarIngresos()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Actualizar" onclick="actualizarIngresos()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Borrar" onclick="borrarIngresos()">&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </div>
            <br>
            <span id="resultado"></span>
            <br>
            
             
            <label for="Ingresos">Ingresos:</label>
			<span id="ingresos"></span><br><br>
            

        </div>
    </body>
</html>
