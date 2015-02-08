<?php

include '../../business/clienteBusiness.php';
$idCliente= $_POST['idCliente'];


//instancia de business
$clienteBusiness = new clienteBusiness();


//se elimina
$result = $clienteBusiness->eliminarCliente($idCliente);

if ($result) {
    echo '<span class="correcto"> Parto Registrado con &Eacute;xito </span>';
} else {
    echo '<span class="incorrecto"> Parto Registrado sin &Eacute;xito </span>';
}

?>
