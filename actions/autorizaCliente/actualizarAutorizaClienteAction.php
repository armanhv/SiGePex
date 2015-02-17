
<?php

include '../../business/autorizaClienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idAutorizacionCliente = $_POST['idAutorizacionCliente'];
$idCliente = $_POST['idCliente'];
$nombreAutorizado = $_POST['nombreAutorizado'];

//comunucacion con Business
$autorizaClienteBusiness = new autorizaClienteBusiness();

//se crea una instancia de cuenta
$objAutorizaCliente = new autorizaCliente($idAutorizacionCliente,$idCliente, $nombreAutorizado);

//se actualiza
$resultado = $autorizaClienteBusiness->actualizarAutorizaCliente($objAutorizaCliente);

if ($resultado) {
    echo '<p>Se ha actualizado correctamente</p></div>';
} else {
    echo '<p>No se ha actualizado</p>';
}
         
