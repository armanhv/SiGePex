<?php

include '../../business/morosidadBusiness.php';
$idCliente = $_POST['idCliente'];

if ($idCliente != 0) {
    //comunicacion con Business
    $morosidadBusiness = new morosidadBusiness();
    $listaMorosidadesCliente = $morosidadBusiness->obtenerMorosidadesCliente($idCliente);

    if (count($listaMorosidadesCliente) != 0) {
        echo '<label>Cuentas morosas</label><br>
          <table>
    <tr>
    <td>Monto</td>&nbsp;&nbsp; <td>    Fecha Limite de Pago</td>
    
    </tr>
    ';
        foreach ($listaMorosidadesCliente as $currentMorosidadCliente) {
            echo '
            <tr>
                <td><input onClick="buscarMorosidad()"  type="radio" id="idMorosidad" name="idMorosidad" value="' . $currentMorosidadCliente->idMorosidad . '" checked>'
            . '<a>' . $currentMorosidadCliente->monto . '</a></td>&nbsp;&nbsp; <td>&nbsp;&nbsp; <a>' . $currentMorosidadCliente->fechaMorosidad . '</a></td>                       
            </tr>';
        }// fin foreach

        echo '</table>';
    }
}
