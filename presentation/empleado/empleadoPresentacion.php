<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>     
        <script type="text/javascript" src="../../js/ajaxEmpleado.js"></script>
        <script type="text/javascript" src="../../js/ajaxRol.js"></script>
        <script type="text/javascript" src="../../js/ajaxTelefono.js"></script>
        <script type="text/javascript" src="../../js/ajaxLicencia.js"></script> 
        <script type="text/javascript" src="../../js/jquery-2-1-3.js"></script>

        <script type="text/javascript" src="../../js/validacion/validarEmail.js"></script>
        <script type="text/javascript" src="../../js/validacion/mascaraTelefono.js"></script>
        <script type="text/javascript" src="../../js/validacion/mascaraCedula.js"></script>
        <script type="text/javascript" src="../../js/validacion/jquery.maskedinput.js"></script>

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
    <body style="" onload="obtenerRoles();
            obtenerEmpleados();
            mascaraCedula();
            moneda()">
        <form name="empleado">
            <p>Mantenimiento de Empleados</p>
            <label for="empleados">Empleados:</label>
            <span id="empleados"></span>
            <table>
                <tr>
                    <td><label for="rol">Rol</label></td>
                    <td><span id="roles"></span></td>
                    <td> <input type="button" value="Limpiar Campos" onclick="limpiarCampos()">&nbsp;&nbsp; </td>
                </tr>
                <tr>
                    <td><label for="cedula">Cédula:</label></td>
                    <td><input type="text" value="" id="txtCedula"></td>
                </tr>
                <tr>
                    <td><label for="nombre">Nombre:</label></td>
                    <td><input type="text" value=""  id="txtNombre"></td>
                </tr>
                <tr>
                    <td><label for="primerApellido">Primer Apellido:</label></td>
                    <td><input type="text" value=""  id="txtPrimerApellido"></td>
                </tr>
                <tr>
                    <td><label for="segundoApellido">Segundo Apellido:</label></td>
                    <td><input type="text" value=""  id="txtSegundoApellido"></td>
                </tr>
                <tr>
                    <td><label for="fechaNacimiento">Fecha Nacimiento:</label></td>
                    <td><input type="text" value=""  id="txtFechaNacimiento"></td>
                </tr>
                <tr>
                    <td><label for="direccionEmpleado">Dirección:</label></td>
                    <td><textarea rows="3" cols="30" maxlength="250s" value="" id="txtDireccionEmpleado"></textarea></td>
                </tr>
                <tr>
                    <td><label for="emailEmpleado">Email Empleado:</label></td>
                    <td><input type="email" value=""  id="txtEmailEmpleado"></td>
                </tr>
                <tr>
                    <td><label for="login">Nombre Usuario:</label></td>
                    <td><input type="text" value="" id="txtLogin"></td>
                </tr>
                <tr>
                    <td><label for="password">Contraseña:</label></td>
                    <td><input type="password" value="" id="txtPassword"></td>
                </tr>
                <tr>
                    <td><label for="CantidadHorasLaborales">Horas laborales:</label></td>
                    <td><input type="text" value=""  id="txtCantidadHorasLaborales"></td>
                </tr>
                <tr>
                    <td><label for="CostoHoraExtra">Precio hora extra:</label></td>
                    <td><input type="text" value=""  id="txtCostoHoraExtra" class="currency"></td>
                </tr>
                <tr>
                    <td><label for="TiempoAlmuerzo">Tiempo almuerzo:</label></td>
                    <td>
                        <select name="cbxTiempoAlmuerzo" id="cbxTiempoAlmuerzo" >
                            <option value="0">Tiempo de Almuerzo</option>
                            <option value="30">30 Minutos</option>
                            <option value="60">1 Hora</option>
                            <option value="120">2 Horas</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="button" value="Insertar Empleado" onclick="insertarEmpleado();"></td>
                    <td><input type="button" value="Modificar Empleado" onclick="actualizarEmpleado()">&nbsp;
                        <input type="button" value="Eliminar Empleado" onclick="eliminarEmpleado()">
                    </td>
                </tr>
            </table>           

            <br>
            <span id="resultado"></span>
            <br>

            <table>
                <tr>
                    <td>
                        <span id="listaTelefonos" ></span>
                        <span id="resultadoTelefono"></span>    <br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span id="listaLicencias"></span>
                        <span id="resultadoLicencia"></span><br>
                    </td>
                </tr>
            </table>

        </form>
    </body>
</html>

<!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
<script type="text/JavaScript">

    $("#txtFechaNacimiento").datepicker();
    datePickerLatino();

</script>