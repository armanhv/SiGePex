
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mantenimiento Banco</title>     
        <script type="text/javascript" src="../../js/ajaxBanco.js"></script>    
        <script type="text/javascript" src="../../js/jquery.js"></script>  
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>  
    </head>
    
    <body onload="obtenerBancos()">
        <div style="margin-left: 500px">
            <p>Módulo Banco</p>
            <table>
                <tr>
                    <td>
                        <label for="banco">Nombre de Banco:&nbsp;&nbsp;</label>
                    </td>
                    <td>
                        <input type="text" value="" name="txtNombreBanco" id="txtNombreBanco">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="button" value="Insertar Banco" onclick="insertarBanco()">&nbsp;&nbsp;</td>
                    <td><input type="button" value="Modificar Banco" onclick="actualizarBanco()">&nbsp;&nbsp;</td>
                    <td><input type="button" value="Borrar Banco" onclick="borrarBanco()">&nbsp;&nbsp;</td>
                </tr>
            </table>
            <br>
            <span id="resultado"></span>
            <br>

            <label for="bancos">Bancos:&nbsp;&nbsp;</label>  
            <span id="bancos"></span><br><br>

        </div>
    </body>
</html>

