<?php

include '../../business/direccionClienteBusiness.php';

//los valores almacenados que se enviarion por el cliente

$idCliente = $_POST['idCliente'];
$direccion = $_POST['direccion'];

//comunucacion con Business
$direccionClienteBusiness = new direccionClienteBusiness();

//se crea una instancia 
$objDireccionCliente = new direccionCliente(0, $idCliente,$direccion);
//se inserta la cuenta
$resultado = $direccionClienteBusiness->insertarDireccionCliente($objDireccionCliente);

if ($resultado) {

    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha insertado correctamente </p></div>';
} else {

    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha insertado</p></div>';
}
       