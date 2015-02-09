<?php
include '../../business/morosidadBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idCliente = $_POST['idCliente'];
$fechaMorosidad = $_POST['fechaMorosidad'];
$monto = $_POST['monto'];

$monto = str_replace(".", "", $monto);
$monto = str_replace(",", ".", $monto);
$monto = str_replace("₡", "", $monto);

$morosidadBusiness = new morosidadBusiness();

$morosidad = new morosidad(0, $idCliente,$fechaMorosidad, $monto );


//se inserta
$resultado = $morosidadBusiness->insertarMorosidad($morosidad);

if ($resultado) {
    
    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha insertado correctamente</p></div>';
    
} else {
     
    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha insertado</p></div>';
    
}

