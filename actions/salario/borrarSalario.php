<?php

include '../../business/salarioBusiness.php';

$idSalario = $_POST['idSalario'];

//instancia de business
$salarioBusiness = new salarioBusiness();

//se elimina
$resultado = $salarioBusiness->eliminarSalario($idSalario);

if ($resultado){
    echo 'Salario eliminado correctamente.';
}  else {
    echo 'No se elimino el salario.';
}

