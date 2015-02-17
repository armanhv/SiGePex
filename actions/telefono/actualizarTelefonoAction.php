
<?php

include '../../business/telefonoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idTelefono = $_POST['idTelefono'];
$numeroTelefono = $_POST['nuevoTelefono'];

//comunucacion con Business
$telefonoBusiness = new telefonoBusiness();

//se crea una instancia de cuenta
$objTelefono = new telefono($idTelefono, 0, $numeroTelefono);

//se actualiza
$result = $telefonoBusiness->actualizarTelefono($objTelefono);

if ($result) {
    echo '<p>Se ha actualizado correctamente el tel&#233fono</p></div>';
} else {
    echo '<p>No se ha actualizado el tel&#233fono</p>';
}
         
