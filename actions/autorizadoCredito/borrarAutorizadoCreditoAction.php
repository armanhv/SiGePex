
<?php

include '../../business/autorizadoCreditoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idAutorizadoCredito = $_POST['idAutorizadoCredito'];

//comunucacion con Business
$autorizadoCreditoBusiness = new autorizadoCreditoBusiness();

//se elimina
$resultado = $autorizadoCreditoBusiness->eliminarAutorizaCliente($idAutorizadoCredito);

if ($resultado) {
    
    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha borrado correctamente</p></div>';
    
} else {
    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha borrado</p>';
    echo ' </div>';
}
?> 
