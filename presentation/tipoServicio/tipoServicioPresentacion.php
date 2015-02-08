<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>RapiServicios</title>     
        <script type="text/javascript" src="../../js/ajaxTipoServicio.js"></script>    
        <script type="text/javascript" src="../../js/jquery.js"></script> 
        
        <script type="text/javascript" src="../../js/validacion/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery.formatCurrency.js"></script>
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>
    </head>

    <body style="" onload="obtenerTipoServicios();moneda()">
        <div style="margin-left: 340px">
            <p>Módulo Tipo de Servicio</p>

            <div id="tablaTipoServicio">
                <table>
                    <tr>
                        <td><label for="tipoServicio">Tipo de Servicio:</label></td>
                        <td><input type="text" id="txtTipoServicio" name="txtTipoServicio"></td>
                    </tr>
                    <tr>
                        <td><label for="precio">Precio del Servicio:</label></td>
                        <td><input type="text" id="txtPrecio" name="txtPrecio" class="currency"></td>
                    </tr>
                    <tr>
                        <td><label for="descripcionTipoServicio">Descripción del Servicio:</label></td>
                        <td><textarea rows="4" cols="22" value="" id="txtDescripcionTipoServicio"></textarea></td>
                    </tr>
                    <tr>
                        <td><input type="button" value="Insertar" onclick="insertarTipoServicio()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Modificar" onclick="actualizarTipoServicio()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Eliminar" onclick="borrarTipoServicio()">&nbsp;&nbsp;</td>
                    </tr>
                </table>

            </div>
            <br>
            <span id="resultado"></span><br>

            <div id="listaTipoServicio" >

            </div>

        </div>
    </body>
</html>
