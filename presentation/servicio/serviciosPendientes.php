<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SiGePex</title>     
        <script type="text/javascript" src="../../js/ajaxServicio.js"></script>    
        <script type="text/javascript" src="../../js/jquery.js"></script>   

        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>

    </head>

    <body style="" onload="obtenerEmpleadosConServicios();">

        <div style="margin-left: 200px">
            <p>Módulo de Servicios Pendientes:</p>
            <div>
                <table>
                    <tr>
                        <td><label for="empleados">Empleado Encargado:</label></td>
                        <td><div id="empleados"></div></td>
                    </tr>
                </table>
            </div>
            <br>

            <div id="tablaServiciosPendientes"></div>

            <br>
            <span id="resultado"></span>
            <br>

        </div>
    </body>
</html>