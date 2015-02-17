<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>RapiServicios</title>     
        <script type="text/javascript" src="../../js/ajaxRol.js"></script>    
        <script type="text/javascript" src="../../js/jquery.js"></script>    
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>    
    </head>

    <body style="" onload="obtenerRoles()">
        <div style="margin-left: 500px">
            <p><font size=6>Módulo Rol</font></p>
            <table>
                <tr>
                    <td>
                        <label for="Dias">Tipo de Rol:&nbsp;&nbsp;</label>
                    </td>
                    <td>
                        <input type="text" value="" name="txtNombreRol" id="txtNombreRol">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="button" value="Insertar" onclick="insertarRol()">&nbsp;&nbsp;</td>
                    <td><input type="button" value="Modificar" onclick="actualizarRol()">&nbsp;&nbsp;</td>
                    <td><input type="button" value="Borrar" onclick="borrarRol()">&nbsp;&nbsp;</td>
                </tr>
            </table>
            <br>
            <span id="resultado"></span>
            <br>

            <label for="rol"><font size=5>Roles:&nbsp;&nbsp;</font></label>  
            <span id="roles"></span><br><br>

        </div>
    </body>
</html>
