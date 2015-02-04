<?php

include '../../business/horarioBusiness.php';

$idHorario = $_POST['idHorario'];

//instancia de business
$horarioBusiness = new horarioBusiness();

//se elimina
$resultado = $horarioBusiness->deleteHorario($idHorario);

if ($resultado){
    echo 'Horario eliminado correctamente.';
}  else {
    echo 'No se elimino el horario.';
}  

