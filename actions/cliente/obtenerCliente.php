<?php

include '../../business/clienteBusiness.php';

//comunicacion con Business
$clienteBusiness = new clienteBusiness();
$listaCliente = $clienteBusiness->obtenerCliente();

echo '<SELECT onChange="cargarCliente();" NAME="cbxCliente" id="cbxCliente" SIZE=1>';
echo '<option value=0>Elija un Cliente</option>';

foreach ($listaCliente as $currentCliente) {

    $nombre = $currentCliente->nombreCliente . " " . $currentCliente->primerApellido . " " . $currentCliente->segundoApellido;
    echo '<option value=' . $currentCliente->idCliente . '>' . $nombre . '</option>';
}

echo '</select>';
=======
<?php

include '../../business/clienteBusiness.php';

//comunicacion con Business
$clienteBusiness = new clienteBusiness();
$listaCliente = $clienteBusiness->obtenerCliente();

echo '<SELECT onChange="cargarCliente();obtenerTelefonosCliente()" NAME="cbxCliente" id="cbxCliente" SIZE=1>';
echo '<option value=0>Elija un Cliente</option>';

foreach ($listaCliente as $currentCliente) {

    echo '<option value=' . $currentCliente->idCliente . '>' . $currentCliente->nombreCliente . "  " .
            $currentCliente->primerApellido . "  " . $currentCliente->segundoApellido . '</option>';
}

echo '</select>';
>>>>>>> origin/master
