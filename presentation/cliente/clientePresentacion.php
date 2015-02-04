<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SiGePex</title>     
        <script type="text/javascript" src="../../js/ajaxCliente.js"></script>    
        <script type="text/javascript" src="../../js/jquery.js"></script>    
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>    
    </head>

    <body style="" onload="obtenerClientes();">
        <div style="margin-left: 500px">
            <p>M&oacute;dulo Cliente</font></p>

            
            <div id="tablaCliente">
                <table>
                    
                    <tr>
                        <td><label for="nombreCliente">Nombre:</label></td>
                        <td><input type="text" value="" name="txtNombreCliente" id="txtNombreCliente"><br></td>
                    </tr>

                    <tr>
                        <td><label for="primerApellido">Primer Apellido:</label></td>
                        <td><input type="text" value="" name="txtPrimerApellido" id="txtPrimerApellido"><br></td>
                    </tr>

                   
                    <tr>
                        <td><label for="segundoApellido">Segundo Apellido:</label></td>
                        <td><input type="text" value="" name="txtSegundoApellido" id="txtSegundoApellido"><br></td>
                    </tr>
                    
                     <tr>
                        <td><label for="direccion">Direcci&oacute;n:</label></td>
                        <td><textarea rows="2" cols="22" maxlength="250s" value=""  id="txtDireccion"></textarea></td>
                    </tr>
                    
                    <tr>
                        <td><input type="button" value="Insertar" onclick="insertarCliente()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Modificar" onclick="actualizarCliente()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Borrar" onclick="borrarCliente()">&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </div>
            <br>
            <span id="resultado"></span>
            <br>

            <label for="Cliente">Elija un Cliente:</label>
            <span id="clientes"></span><br>


        </div>
    </body>
</html>
