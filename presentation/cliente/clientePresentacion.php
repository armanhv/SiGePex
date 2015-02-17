<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SiGePex</title>     
        <script type="text/javascript" src="../../js/ajaxCliente.js"></script>    
        <script type="text/javascript" src="../../js/ajaxTelefonoCliente.js"></script>
        <script type="text/javascript" src="../../js/ajaxCredito.js"></script>    
        <script type="text/javascript" src="../../js/ajaxAutorizaCliente.js"></script>
        <script type="text/javascript" src="../../js/ajaxDireccionCliente.js"></script>

        <script type="text/javascript" src="../../js/jquery.js"></script>       
        <script type="text/javascript" src="../../js/jquery-2-1-3.js"></script>           
        <script type="text/javascript" src="../../js/validacion/mascaraTelefono.js"></script>
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script> 

        <script type="text/javascript" src="../../js/validacion/jquery-ui.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery.formatCurrency.js"></script>
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>
        <link rel="stylesheet" href="../../js/validacion/jquery-ui.css">

        <!--Este script es para que no se pueda pegar ni copiar-->
        <script type="text/javascript">
            $(document).ready(function () {
                $('input[type=text]').bind('copy paste cut', function (e) {
                    e.preventDefault();
                });
            });
        </script>
    </head>

    <body style="" onload="obtenerClientes();">
        <div style="margin-left: 100px">
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
                        <td><input type="button" value="Insertar" onclick="insertarCliente()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Modificar" onclick="actualizarCliente()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Borrar" onclick="borrarCliente()">&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </div>

            <label for="Cliente">Elija un Cliente:</label>
            <span id="clientes"></span>
            <br>

            <span id="resultado"></span>
            <br>

            <table>
                <tr>
                    <td><span id="listaTelefonos" ></span></td>
                    <td><span id="listaAutorizaCliente" ></span></td>
                    <td><span id="listaDireccionesCliente" ></span></td>
                </tr>
                <tr>
                    <td><span id="resultadoTelefono"></span></td>
                    <td><span id="resultado"></span></td>
                    <td><span id="resultado"></span></td>
                </tr>
            </table>
        </div>
    </body>
</html>
<!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
<script type="text/JavaScript">

    $("#txtFechaPagoLimite").datepicker();
    datePickerLatino();

</script>