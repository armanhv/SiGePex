<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SiGePex</title>     
        <script type="text/javascript" src="../../js/ajaxCliente.js"></script>    
        <script type="text/javascript" src="../../js/ajaxTelefonoCliente.js"></script>
        <script type="text/javascript" src="../../js/ajaxCredito.js"></script>    
        <script type="text/javascript" src="../../js/ajaxAutorizaCliente.js"></script>
        <script type="text/javascript" src="../../js/ajaxAutorizadoCredito.js"></script>

        <script type="text/javascript" src="../../js/jquery-2-1-3.js"></script>           

        <script type="text/javascript" src="../../js/validacion/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery-ui.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery.formatCurrency.js"></script>
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>
        <link rel="stylesheet" href="../../js/validacion/jquery-ui.css">

    </script>
</head>

<body onload=" obtenerClientes();">
    <div style="margin-left: 500px">
        <p><font size=6>Módulo de Creditos</font></p>

        <div id="tablaCreditos">
            <table>
                <tr>
                    <td><label for="clientes">Cliente:</label></td>
                    <td><div id="clientes"></div></td>
                </tr>
            </table>

        </div>

        <span id="resultado"></span>
        <br>

        <span id="listaCreditosCliente" ></span>
        <br>

        <span id="resultadoCredito"></span>
        <br>

        <span id="listaAutorizadosCredito" ></span>
        <br>

        <span id="resultadoAutorizadoCredito"></span>

    </div>
</body>
</html>

<!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
<script type="text/JavaScript">

    $("#txtFechaPagoLimite").datepicker();
    datePickerLatino();

</script>

