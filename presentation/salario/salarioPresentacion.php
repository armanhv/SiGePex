<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>     
        <script type="text/javascript" src="../../js/ajaxSalario.js"></script>  

        <script type="text/javascript" src="../../js/jquery.js"></script> 

        <script type="text/javascript" src="../../js/validacion/jquery.maskedinput.js"></script>

        <script type="text/javascript" src="../../js/validacion/jquery-ui.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery.formatCurrency.js"></script>
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>
    </head>

    <body style="" onload="obtenerSalarios();
            obtenerEmpleados();
            moneda()">
        <div style="margin-left: 500px">
            <p>Módulo Salario</font></p>

            <div id="tablaSalario">
                <table>
                    <tr>
                        <td><label for="empleado">Eliga un Empleado:</label></td>
                        <td><span id="empleados"></span></td>
                    </tr>
                    <tr>
                        <td><label for="salarioBase">Salario Base:</label></td>
                        <td><input type="text" value="" name="txtSalarioBase" id="txtSalarioBase" class="currency"><br></td>
                    </tr>
                    <tr>
                        <td><label for="HorasExtra">Hora Extra:</label></td>
                        <td><input type="text" value="" name="txtHorasExtras" id="txtHorasExtras" class="currency"><br></td>
                    </tr>

                    <tr>
                        <td><label for="bonificaciones">Bonificaciones:</label></td>
                        <td> <input type="text" value="" name="txtBonificaciones" id="txtBonificaciones" class="currency"><br></td>
                    </tr>

                    <tr>
                        <td><label for="diasExtra">Dias Extra:</label></td>
                        <td> <input type="text" value="" name="txtDiasExtra" id="txtDiasExtra" class="currency"><br></td>
                    </tr>
                    <tr>
                        <td><input type="button" value="Insertar" onclick="insertarSalario()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Modificar" onclick="actualizarSalario()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Borrar" onclick="borrarSalario()">&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </div>
            <br>
            <span id="resultado"></span>
            <br>

            <label for="salario"><font size=5>Salarios:&nbsp;&nbsp;</font></label>  
            <span id="salarios"></span><br><br>


        </div>
    </body>
</html>

