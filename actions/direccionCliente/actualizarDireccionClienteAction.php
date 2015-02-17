
<?php

include '../../business/direccionClienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idDireccion = $_POST['idDireccion'];
$idCliente = $_POST['idCliente'];
$direccion = $_POST['direccion'];

//comunucacion con Business
$direccionClienteBusiness = new direccionClienteBusiness();

//se crea una instancia de cuenta
$objDireccionCliente = new direccionCliente($idDireccion,$idCliente, $direccion);

//se actualiza
$resultado = $direccionClienteBusiness->actualizarDireccionCliente($objDireccionCliente);

if ($resultado) {
    echo '<p>Se ha actualizado correctamente</p></div>';
} else {
    echo '<p>No se ha actualizado</p>';
}
         
