
<?php

include '../../business/autorizaClienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idAutorizacionCliente = $_POST['idAutorizacionCliente'];

//comunucacion con Business
$autorizaClienteBusiness = new autorizaClienteBusiness();

//se elimina
$resultado = $autorizaClienteBusiness->eliminarAutorizaCliente($idAutorizacionCliente);

if ($resultado) {
    
    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha borrado correctamente</p></div>';
    
} else {
    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha borrado</p>';
    echo ' </div>';
}
?> 
