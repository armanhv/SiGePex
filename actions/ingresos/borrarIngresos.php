<?php

include '../../business/ingresosBusiness.php';

$idIngresos = $_POST['idIngresos'];

//instancia de business
$ingresosBusiness = new ingresosBusiness();

//se elimina
$result = $ingresosBusiness->eliminarIngresos($idIngresos);

if ($result) {
    echo '<span class="correcto">El ingreso se eliminó correctamente</span>';
} else {
   echo '<span class="incorrecto">El ingreso no se eliminó correctamente</span>';
}