<?php

include '../../business/ingresosBusiness.php';

$idIngresos = $_POST['idIngresos'];

//instancia de business
$ingresosBusiness = new ingresosBusiness();

//se elimina
$result = $ingresosBusiness->eliminarIngresos($idIngresos);

if ($result) {
    echo '<span class="correcto"> Parto Registrado con &Eacute;xito </span>';
} else {
    echo '<span class="incorrecto"> Parto Registrado sin &Eacute;xito </span>';
}

?>
