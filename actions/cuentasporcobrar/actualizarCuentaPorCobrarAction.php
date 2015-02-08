
<?php
include '../../business/cuentasPorCobrarBusiness.php';

$idCuentasPorCobrar = $_POST['idCuentasPorCobrar'];
$idEmpleado = $_POST['idEmpleado'];
$idCliente = $_POST['idCliente'];
$fechaPago = $_POST['fechaPago'];
$monto = $_POST['monto'];

//comunicacion con business
$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();

//intancina de cuentas por cobrar
$cuentaPorCobrar = new cuentasPorCobrar($idCuentasPorCobrar, $idEmpleado,$idCliente,$fechaPago,$monto);

//se actualiza
$resultado = $cuentasPorCobrarBusiness->actualizarCuentaPorCobrar($cuentaPorCobrar);

if ($resultado) {
    
    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha actualizado correctamente</p></div>';
    
} else {
      
    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha actualizado</p></div>';
}