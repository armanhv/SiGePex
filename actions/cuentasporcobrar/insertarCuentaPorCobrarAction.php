<?php
include_once '../../business/cuentasPorCobrarBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idEmpleado = $_POST['idEmpleado'];
$idCliente = $_POST['idCliente'];
$fechaPago = $_POST['fechaPago'];
$monto = $_POST['monto'];

//comunicacion con busines
$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();

//intancina de cuentasporcobrar
$cuentasPorCobrar = new cuentasPorCobrar(0, $idEmpleado,$idCliente,$fechaPago,$monto);

//echo $idEmpleado . ' - ' . $idCliente . ' - ' . $fechaPago . ' - ' . $monto ;

//se actualiza
$resultado = $cuentasPorCobrarBusiness->insertarCuentaPorCobrar($cuentasPorCobrar);

if ($resultado) {
    
    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha insertado correctamente</p></div>';
    
} else {
     
    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha insertado</p></div>';
    
}