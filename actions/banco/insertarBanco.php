<?php
include '../../business/bancoBusiness.php';

$nombreBanco = $_POST['nombreBanco'];
$bancoBusiness = new bancoBusiness();
$banco = new banco(0, $nombreBanco);
$resultado = $bancoBusiness->insertBanco($banco);

if ($resultado) {
    echo 'Se inserto corectamente.';
}else {
    echo 'Error al insertar.';
}