<?php

include '../../business/autorizadoCreditoBusiness.php';

//los valores almacenados que se enviarion por el cliente

$idCredito = $_POST['idCredito'];
$nombreAutorizado = $_POST['nombreAutorizado'];

//comunucacion con Business
$autorizadoCreditoBusiness = new autorizadoCreditoBusiness();

//se crea una instancia 
$objAutorizadoCredito = new autorizadoCredito(0, $idCredito,$nombreAutorizado);
//se inserta la cuenta
$resultado = $autorizadoCreditoBusiness->insertarAutorizadoCredito($objAutorizadoCredito);

if ($resultado) {

    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha insertado correctamente </p></div>';
} else {

    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha insertado</p></div>';
}
       