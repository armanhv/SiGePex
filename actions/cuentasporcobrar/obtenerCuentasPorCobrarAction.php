<?php

include '../../business/cuentasPorCobrarBusiness.php';

//comunicacion con Business
$idCliente = $_POST['idCliente'];
if ($idCliente != 0) {
    $cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();
    $cuentasPorCobrar = $cuentasPorCobrarBusiness->obtenerCuentasPorCobrar($idCliente);

    if (count($cuentasPorCobrar) != 0) {
        echo '<label>Cuentas por Cobrar</label><br>
          <table>
    <tr>
    <td>Monto</td>&nbsp;&nbsp; <td>    Fecha Limite de Pago</td>
    
    </tr>
    ';
        foreach ($cuentasPorCobrar as $currentCuentaPorCobrar) {
            echo '
            <tr>
                <td><input onClick="buscarCuentasPorCobrar()"  type="radio" id="idCuentaPorCobrar" name="idCuentaPorCobrar" value="' . $currentCuentaPorCobrar->idCuentasPorCobrar . '" checked>'
            . '<a>' . $currentCuentaPorCobrar->monto . '</a></td>&nbsp;&nbsp; <td>&nbsp;&nbsp; <a>' . $currentCuentaPorCobrar->fechaPago . '</a></td>                       
            </tr>';
        }// fin foreach

        echo '</table>';
    }
}
