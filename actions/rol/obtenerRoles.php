<?php

include '../../business/rolBusiness.php';

//comunicacion con Business
$rolBusiness = new rolBusiness();
$listaRoles = $rolBusiness->getRoles();

echo '<SELECT onChange="cargarRoles()" NAME="cbxRoles" id="cbxRoles" SIZE=1>';
 echo '<option value="0">Elija un Rol</option>';

foreach ($listaRoles as $currentRol) {

    $idRol = $currentRol->idRol;
    $nombreRol = $currentRol->nombreRol;

    echo '<option value=' . $idRol . '>' . $nombreRol . '</option>';
}