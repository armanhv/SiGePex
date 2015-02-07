<?php

include '../../business/morosidadBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idMorosidad = $_POST['idMorosidad'];

//comunicacion con business
$morosidadBusiness = new morosidadBusiness();

//se borra
$resultado = $morosidadBusiness->eliminarMorosidad($idMorosidad);

if ($resultado) {
    
    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha borrado correctamente</p></div>';
    
} else {
     
    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha borrado</p></div>';
    
}