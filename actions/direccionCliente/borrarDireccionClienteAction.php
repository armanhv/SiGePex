<?php

include '../../business/direccionClienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idDireccion = $_POST['idDireccion'];

//comunucacion con Business
$direccionClienteBusiness = new direccionClienteBusiness();

//se elimina
$resultado = $direccionClienteBusiness->eliminarDireccionCliente($idDireccion);

if ($resultado) {

    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha borrado correctamente</p></div>';
} else {
    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha borrado</p>';
    echo ' </div>';
}