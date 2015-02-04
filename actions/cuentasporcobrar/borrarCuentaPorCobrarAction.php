
<?php
include '../../business/cuentasPorCobrarBusiness.php';

$idCuentasPorCobrar = $_POST['idCuentasPorCobrar'];

//comunicacion con business
$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();

//se elimina
$resultado = $cuentasPorCobrarBusiness->borrarCuentaPorCobrar($idCuentasPorCobrar);

if ($resultado) {

    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha borrado correctamente</p></div>';
} else {

    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha borrado</p></div>';
}