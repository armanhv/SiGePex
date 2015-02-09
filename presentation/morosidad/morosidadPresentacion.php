
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Mantenimiento de Morosidad</title>     
        <script type="text/javascript" src="../../js/ajaxMorosidad.js"></script>
        <script type="text/javascript" src="../../js/jquery.js"></script> 

        <script type="text/javascript" src="../../js/validacion/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery-ui.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery.formatCurrency.js"></script>
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>
        <link rel="stylesheet" href="../../js/validacion/jquery-ui.css">
    </head>

    <body onload=" obtenerClientesMorosidades();
        moneda();">
        <div style="margin-left: 500px">
            <p>Módulo de Morosidad</p>

            <table>
                <tr>
                    <td><label for="clientes">Cliente:</label></td>
                    <td><div id="clientes"></div></td>
                </tr>
                <tr>
                    <td>
                        <label for="fechaMorosidad">Fecha:&nbsp;&nbsp;</label>
                    </td>
                    <td>
                        <input type="text" value="" name="txtFechaMorosidad" id="txtFechaMorosidad">
                    </td>
                    <td></td>

                <tr>
                    <td>
                        <label for="monto">Monto:&nbsp;&nbsp;</label>
                    </td>
                    <td>
                        <input type="text" value="" name="txtMonto" id="txtMonto" class="currency">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="button" value="Insertar" onclick="insertarMorosidad()">&nbsp;</td>
                    <td><input type="button" value="Modificar" onclick="actualizarMorosidad()">&nbsp;</td>
                    <td><input type="button" value="Borrar" onclick="borrarMorosidad()">&nbsp;</td>
                </tr>
            </table>
            <br>
            <span id="resultado"></span>
            <br>     
            <span id="morosidades"></span><br><br>

        </div>
    </body>
</html>

<!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
<script type="text/JavaScript">

    $("#txtFechaMorosidad").datepicker();
    datePickerLatino();

</script>

