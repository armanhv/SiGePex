<?php

include '../../business/bancoBusiness.php';

//comunicacion con Business
$bancoBusiness = new bancoBusiness();
$listaBancos = $bancoBusiness->getBancos();

echo '<SELECT onClick="cargarBancos()" NAME="cbxBancos" id="cbxBancos" SIZE=1>'
 . '<option value="0">Eliga un banco</option>';

foreach ($listaBancos as $currentBanco) {

    $idBanco = $currentBanco->idBanco;
    $nombreBanco = $currentBanco->nombreBanco;

    echo '<option value=' . $idBanco . '>' . $nombreBanco . '</option>';
}