
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Morosidades por Rango de fechas</title>     
        <script type="text/javascript" src="../../js/ajaxMorosidad.js"></script>
        <script type="text/javascript" src="../../js/jquery.js"></script> 

        <script type="text/javascript" src="../../js/validacion/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery-ui.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery.formatCurrency.js"></script>
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>
        <link rel="stylesheet" href="../../js/validacion/jquery-ui.css">
        <link rel="stylesheet" href="../../css/tablasSimples.css">
    </script>
</head>
<body onload=" obtenerClientesMorosidades();">
    <div style="margin-left: 300px">
        <p><font size=6>Módulo de Morosidades por Rango de fechas</font></p>

        <table>
            <tr>
                <td>
                    <label for="fechaInicio">Fecha Inicio:&nbsp;&nbsp;</label>
                    <input type="text" value="" name="txtFechaInicio" id="txtFechaInicio">
                </td>
                <td>
                    <label for="fechaFinal">Fecha Final:&nbsp;&nbsp;</label>
                    <input type="text" value="" name="txtFechaFinal" id="txtFechaFinal">
                </td>
                <td>
                    <input type="submit" value="Buscar Morosidades" name="btnBuscarMorosidades" id="btnBuscarMorosidades" onclick="obtenerMorosidadesRangoFechas()" >
                </td>
            </tr>
        </table>
        <!--</div>-->

        <br>
        <span id="morosidades"></span><br><br>

    </div>
</body>
</html>

