<?php

include '../../business/autorizaClienteBusiness.php';

//los valores almacenados que se enviarion por el cliente

$idCliente = $_POST['idCliente'];
$nombreAutorizado = $_POST['nombreAutorizado'];

//comunucacion con Business
$autorizaClienteBusiness = new autorizaClienteBusiness();

//se crea una instancia 
$objAutorizaCliente = new autorizaCliente(0, $idCliente,$nombreAutorizado);
//se inserta la cuenta
$resultado = $autorizaClienteBusiness->insertarAutorizaCliente($objAutorizaCliente);

if ($resultado) {

    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha insertado correctamente </p></div>';
} else {

    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha insertado</p></div>';
}
       