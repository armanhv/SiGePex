
<?php

include '../../business/creditoBusiness.php';

$idCredito = $_POST['idCredito'];

//instancia de business
$creditoBusiness = new creditoBusiness();

//se elimina
$resultado = $creditoBusiness->eliminarCredito($idCredito);

if ($resultado) {
    
    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha borrado correctamente el credito</p></div>';
    
} else {
    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha borrado el credito</p>';
    echo ' </div>';
}
?> 
