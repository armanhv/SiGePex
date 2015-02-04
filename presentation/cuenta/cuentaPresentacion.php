<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>RapiServicios</title>     
        <script type="text/javascript" src="../../js/ajaxCuenta.js"></script>    
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>    
        <script type="text/javascript" src="../../js/ajaxBanco.js"></script>    
        <script type="text/javascript" src="../../js/jquery.js"></script>    
    </head>

    <body style="" onload="obtenerCuentas();obtenerBancos();obtenerEmpleadosCuentas()">
        <div style="margin-left: 500px">
            <p>Módulo Cuenta</font></p>

            <div id="tablaCuenta">
                <table>
                    <tr>
                        <td> <label for="empleados">Empleado:</label></td>
                        <td> <div id="empleados"></div></td>
                    </tr>
                    <tr>
                        <td><label for="numeroCuenta">Numero Cuenta:</label></td>
                        <td><input type="text" value="" name="txtNumeroCuenta" id="txtNumeroCuenta"><br></td>
                    </tr>

                    <tr>
                        <td><label for="nombreBanco">Nombre Banco:</label></td>
                        <td><span id="bancos"></span><br></td>
                    </tr>

                    <tr>
                        <td><label for="tipoCuenta">Tipo Cuenta:</label></td>
                        <td> <select id="cbxTipoCuenta" name="cbxTipoCuenta">
                                <option value="0">Eliga un tipo de cuenta</option>
                                <option value="Ahorro">Ahorro</option>
                                <option value="Cuenta Corriente">Cuenta Corriente</option>
                                <option value="Extranjera">Extranjera</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><label for="numeroSimpe">Numero Simpe:</label></td>
                        <td><input type="text" value="" name="txtnumeroSimpe" id="txtnumeroSimpe"><br></td>
                    </tr>

                    <tr>
                        <td><input type="button" value="Insertar" onclick="insertarCuenta()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Actualizar" onclick="actualizarCuenta()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Borrar" onclick="borrarCuenta()">&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </div>
            <br>
            <span id="resultado"></span>
            <br>

            <label for="Cuenta">Elija una cuenta:</label>
            <span id="cuentas"></span><br>


        </div>
    </body>
</html>
