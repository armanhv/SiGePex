
<?php

include '../../business/telefonoBusiness.php';

$idTelefono = $_POST['idTelefono'];

//instancia de business
$telefonoBusiness = new telefonoBusiness();

//se elimina
$resultado = $telefonoBusiness->eliminarTelefono($idTelefono);

if ($resultado) {
    
    echo '<div id="dialog" title="Mensaje">';
    echo '<p>Se ha borrado correctamente el tel&#233fono</p></div>';
    
} else {
    echo '<div id="dialog" title="Error">';
    echo '<p>No se ha borrado el tel&#233fono</p>';
    echo ' </div>';
}
?> 
