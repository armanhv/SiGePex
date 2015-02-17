
<?php

include '../../business/autorizadoCreditoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idAutorizadoCredito = $_POST['idAutorizadoCredito'];
$idCredito = $_POST['idCredito'];
$nombreAutorizado = $_POST['nombreAutorizado'];

//comunucacion con Business
$autorizadoCreditoBusiness = new autorizadoCreditoBusiness();

//se crea una instancia de cuenta
$objAutorizadoCredito = new autorizadoCredito($idAutorizadoCredito,$idCredito, $nombreAutorizado);

//se actualiza
$resultado = $autorizadoCreditoBusiness->actualizarAutorizadoCredito($objAutorizadoCredito);

if ($resultado) {
    echo '<p>Se ha actualizado correctamente</p></div>';
} else {
    echo '<p>No se ha actualizado</p>';
}
         
