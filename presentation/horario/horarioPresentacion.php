<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>RapiServicios</title>     
        <script type="text/javascript" src="../../js/ajaxHorario.js"></script>    
        <script type="text/javascript" src="../../js/jquery.js"></script>    
        <script type="text/javascript" src="../../js/validacion/utilidades.js"></script>    
    </head>

    <body style="" onload="obtenerEmpleadosHorario()">
        <div style="margin-left: 340px">
            <p>Módulo Horario</p>
            <table>
                <tr>
                    <td><label for="Empleado">Eliga un Empleado:</label></td>
                    <td><span id="empleados"></span></td>
                </tr>
                <tr>
                    <td><label for="Dias">Día(s) de Trabajo:</label></td>
                    <td>
                        <input type="radio" id="rbnDias" name="rbnDias" value="Lunes">Lunes<br>
                        <input type="radio" id="rbnDias" name="rbnDias" value="Martes">Martes<br>
                        <input type="radio" id="rbnDias" name="rbnDias" value="Miércoles">Miércoles<br>
                        <input type="radio" id="rbnDias" name="rbnDias" value="Jueves">Jueves<br>
                        <input type="radio" id="rbnDias" name="rbnDias" value="Viernes">Viernes<br>
                        <input type="radio" id="rbnDias" name="rbnDias" value="Sábado">Sábado<br>
                        <input type="radio" id="rbnDias" name="rbnDias" value="Domingo">Domingo<br>
                    </td>
                <tr>
                    <td></td>
                    <td>Hora:</td>
                    <td>Minutos:</td>
                </tr>
                <tr>
                    <td><label for="HoraInicio">Hora Inicio:</label></td>
                    <td>
                        <select name="cbxHoraInicio" id="cbxHoraInicio" >
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07" selected>07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                        </select>
                    </td>
                    <td>
                        <select name="cbxHoraInicioMinutos" id="cbxHoraInicioMinutos" >
                            <option value="00" selected>00</option>
                            <option value="05">05</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="55">55</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><label for="HoraSalida">Hora de salida:</label></td>
                    <td>
                        <select name="cbxHoraSalida" id="cbxHoraSalida" >
                            <option value="00">00</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08"selected>08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                        </select>
                    </td>
                    <td>
                        <select name="cbxHoraSalidaMinutos" id="cbxHoraSalidaMinutos" >
                            <option value="00" selected>00</option>
                            <option value="05">05</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                            <option value="25">25</option>
                            <option value="30">30</option>
                            <option value="35">35</option>
                            <option value="40">40</option>
                            <option value="45">45</option>
                            <option value="50">50</option>
                            <option value="55">55</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><input type="button" value="Insertar" onclick="insertarHorario()">&nbsp;&nbsp;</td>
                </tr>
            </table><br>

            <span id="resultado"></span><br>

            <div id="listaHorarios" >

            </div>

        </div>
    </body>
</html>
