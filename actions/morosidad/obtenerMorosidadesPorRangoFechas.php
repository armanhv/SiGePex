<?php

include '../../business/morosidadBusiness.php';
include_once '../../business/clienteBusiness.php';
$fechaInicio = $_POST['fechaInicio'];
$fechaFinal = $_POST['fechaFinal'];

//comunicacion con Business
$morosidadBusiness = new morosidadBusiness();
$listaMorosidades = $morosidadBusiness->obtenerMorosidadesRangoFechas($fechaInicio, $fechaFinal);
$clienteBusiness = new clienteBusiness();

if (count($listaMorosidades) != 0) {
    

    echo '<label>Cuentas morosas</label><br> ';

    echo '<table border="1" id="mitabla">
    <tr>
        <th>Id Morosidad </th>
        <th>Cliente</th>
        <th>Fecha Morosidad</th>
        <th>Monto</th>
    </tr>
    </th>
    <tbody>    
    ';
    foreach ($listaMorosidades as $currentMorosidad) {
        $cliente=$clienteBusiness->buscarCliente($currentMorosidad->idCliente );
        $nombreCompletoCliente=$cliente->nombreCliente.'    '.$cliente->primerApellido.'   '.$cliente->segundoApellido;
        echo '
            <tr>
                <td><a>' . $currentMorosidad->idMorosidad . '</a></td>&nbsp;&nbsp; '
                .'<td>&nbsp;&nbsp; <a>' . $nombreCompletoCliente . '</a></td>' 
                .'<td>&nbsp;&nbsp; <a>' . $currentMorosidad->fechaMorosidad . '</a></td>'
                .'<td>&nbsp;&nbsp; <a>' . $currentMorosidad->monto . '</a></td> 
            </tr>';
    }// fin foreach

    echo '</tbody>
    </table>';
}

