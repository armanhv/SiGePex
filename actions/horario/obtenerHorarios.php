<?php

include '../../business/horarioBusiness.php';

$idEmpleado = $_POST['idEmpleado'];
$sumaTotalHoras = 0;

if ($idEmpleado == 0) {
    echo 'No eligio un empleado';
} else {
    //comunicacion con Business
    $horarioBusiness = new horarioBusiness();
    $listaHorarioDeEmpleado = $horarioBusiness->buscarHorarioDeEmpleado($idEmpleado); // busco los horarios de este empleado
    $empleado = $horarioBusiness->buscarEmpleadoHorario($idEmpleado); //obtengo el empleado con este id
    //formo el nombre
    $nombreEmpleado = $empleado->nombreEmpleado . " " . $empleado->primerApellidoEmpleado . " " . $empleado->segundoApellidoEmpleado;

    echo '    
    <p>Horario de: ' . $nombreEmpleado . '</p>
    <p>Horas laborales asigables por semana: ' . $empleado->cantidadHorasLaborales . '</p>     
    
        <table>
            <tr>
                <td></td>
                <td>Día: &nbsp;&nbsp;&nbsp;</td>
                <td>Hora Entrada: &nbsp;&nbsp;&nbsp;</td>
                <td>Hora Salida: &nbsp;&nbsp;&nbsp;</td>
            </tr>';

    foreach ($listaHorarioDeEmpleado as $currentHorario) {
        echo '
            <tr>
                <td><input type="radio" id="idHorario" name="idHorario" value="' . $currentHorario->idHorario . '" checked></td>
                <td><a>' . $currentHorario->diaHorario . '</a></td>
                <td><a>' . $currentHorario->horaInicio . '</a></td>
                <td><a>' . $currentHorario->horaSalida . '</a></td>
            </tr>';
        $sumaTotalHoras += $currentHorario->totalHoras;
    }// fin foreach

    echo '
        </table>
    <br>
    <input type="button" value="Quitar Horario" onclick="borrarHorario()">
    

    <h3>Total de Horas Asignadas:</h3>
        <a>' . $sumaTotalHoras . '</a>
    ';
}//fin de ELSE IF 

