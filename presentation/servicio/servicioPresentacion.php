<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SiGePex</title>     
        <script type="text/javascript" src="../../js/ajaxServicio.js"></script>    
        <script type="text/javascript" src="../../js/ajaxCliente.js"></script>    
        <script type="text/javascript" src="../../js/ajaxSalario.js"></script>   
        <script type="text/javascript" src="../../js/ajaxIngresos.js"></script>
        <script type="text/javascript" src="../../js/ajaxTipoServicio.js"></script>    
        <script type="text/javascript" src="../../js/jquery.js"></script>   

        <script type="text/javascript" src="../../js/validacion/jquery-ui.js"></script>
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>
        <link rel="stylesheet" href="../../js/validacion/jquery-ui.css">
        <script type="text/javascript" src="../../js/validacion/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery.formatCurrency.js"></script>

    </head>

    <body style="" onload="obtenerClientes();
            obtenerEmpleados();
            obtenerTipoServicios();
            obtenerServicios();
            obtenerTipoPago();
            moneda();">

        <div style="margin-left: 500px">
            <p>Módulo de Servicios</p>
            <div id="tablaServicios">
                <table>
                    <tr>
                        <td><label for="Cliente">Cliente:</label></td>
                        <td><span id="clientes"></span></td>
                    </tr>
                    <tr>
                        <td><label for="empleados">Empleado:</label></td>
                        <td><div id="empleados"></div></td>
                    </tr>
                    <tr>
                        <td><label for="tipoServicio">Elija un Tipo de Servicio:</label></td>
                        <td><span id="listaTipoServicio"></span></td>
                    </tr>
                    <tr>
                        <td><label for="fechaServicio">Fecha del Servicio:</label></td>
                        <td><input type="text" value="" name="txtFechaServicio" id="txtFechaServicio"></td>
                    </tr>
                    <tr>
                        <td><label for="formaPago">Forma de Pago:</label></td>
                        <td><span id="tipoPagos"></span></td>
                    </tr>
                    <tr id="trBoucher" style="display:none">
                        <td><label for="numBoucher">Numero de Boucher:</label></td>
                        <td><input type="text" value="" name="txtNumBoucher" id="txtNumBoucher"><br></td>
                    </tr>
                    <tr>
                        <td><label for="cargosExtra">Cargos Extra:</label></td>
                        <td><input type="text" id="txtCargosExtra" name="txtCargosExtra" class="currency" onchange="mostrarTotal();"></td>
                    </tr>
                    <tr>
                        <td><label for="descripcionCargoExtra">Descripción Por Cargos Extra:</label></td>
                        <td><textarea rows="4" cols="22" value="" id="txtDescripcionCargoExtra"></textarea></td>
                    </tr>   
                    <tr>
                        <td><label for="descripcionServicio">Descripción del Servicio:</label></td>
                        <td><textarea rows="4" cols="22" value="" id="txtDescripcionServicio"></textarea></td>
                    </tr>             
                    <tr>
                        <td><label for="montoTotal">Total a Pagar:</label></td>
                        <td><span id="montoTotal">₡ 0 </span></td>
                    </tr>
                    <tr>
                        <td><input type="button" value="Insertar" onclick="insertarServicio()"></td>
                        <td><input type="button" value="Actualizar" onclick="actualizarServicio()"></td>
                        <td><input type="button" value="Borrar" onclick="borrarServicio()"></td>
                    </tr>
                </table>
            </div>
            <br>


            <br>
            <span id="resultado"></span>

            <br>

            <label for="Servicios">Servicios:</label>
            <span id="servicios"></span><br>

        </div>
    </body>
</html>

<!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
<script type="text/JavaScript">

    $("#txtFechaServicio").datepicker();
    $("#txtFechaPago").datepicker();
    datePickerLatino();

</script>
