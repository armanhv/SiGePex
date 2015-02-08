<?php


include '../../business/morosidadBusiness.php';
$fechaInicio = $_POST['fechaInicio'];
$fechaFinal = $_POST['fechaFinal'];

    //comunicacion con Business
    $morosidadBusiness = new morosidadBusiness();
    $listaMorosidades= $morosidadBusiness->obtenerMorosidadesRangoFechas($fechaInicio, $fechaFinal);

    if (count($listaMorosidades) != 0) {
        echo '<label>Cuentas morosas</label><br>
          <table>
    <tr>
    <td>Monto</td>&nbsp;&nbsp; <td>    Fecha Limite de Pago</td>
    
    </tr>
    ';
        foreach ($listaMorosidades as $currentMorosidad) {
            echo '
            <tr>
                <td><input onClick="buscarMorosidad()"  type="radio" id="idMorosidad" name="idMorosidad" value="' . $currentMorosidad->idMorosidad . '" checked>'
            . '<a>' . $currentMorosidad->monto . '</a></td>&nbsp;&nbsp; <td>&nbsp;&nbsp; <a>' . $currentMorosidad->fechaMorosidad . '</a></td>                       
            </tr>';
        }// fin foreach

        echo '</table>';
    }

