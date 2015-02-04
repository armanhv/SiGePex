<?php

include '../../business/rolBusiness.php';

$idRol = $_POST['idRol'];

//instancia de business
$rolBusiness = new rolBusiness();

//se elimina
$resultado = $rolBusiness->deleteRol($idRol);

if ($resultado){
    echo 'Rol eliminado correctamente.';
}  else {
    echo 'No se elimino el rol.';
}

