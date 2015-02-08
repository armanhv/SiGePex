<?php

include '../../business/cuentasPorCobrarBusiness.php';

//comunicacion con Business
$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();
$cuentasPorCobrar = $cuentasPorCobrarBusiness->obtenerCuentasPorCobrar();

echo '<SELECT onClick="buscarCuentasPorCobrar()" NAME="cbxCuentasPorCobrar" id="cbxCuentasPorCobrar" SIZE=1>';
echo '<option value=0>Seleccione una Cuenta Por Cobrar</option>';

foreach ($cuentasPorCobrar as $currentCuentaPorCobrar) {

      $idCuentasPorCobrar = $currentCuentaPorCobrar->idCuentasPorCobrar;
      
    $monto = $currentCuentaPorCobrar->monto;
    
    echo '<option value=' . $idCuentasPorCobrar . '>'  . $monto .' </option>';
}
