<?php

include '../../business/ingresosBusiness.php';

//los valores almacenados que se enviarion por el cliente
 $idIngresos= $_POST['idIngresos'];
 $idEmpleado= $_POST['idEmpleado'];
 $idCliente= $_POST['idCliente'];
 $tipoPago= $_POST['tipoPago'];
 $numBoucher= $_POST['numBoucher'];
 $monto= $_POST['monto'];
 $fechaIngreso= $_POST['fechaIngreso'];

//comunucacion con Business
$ingresosBusiness = new ingresosBusiness();

//se crea una instancia de ingresos
$newIngresos = new ingresos($idIngresos, $idEmpleado, $idCliente, $tipoPago, $numBoucher, $monto,$fechaIngreso);

//se actualiza
$result = $ingresosBusiness->actualizarIngresos($newIngresos);

if ($result) {
    echo '<span class="correcto"> Parto Registrado con &Eacute;xito </span>';
} else {
   echo '<span class="incorrecto"> Parto Registrado sin &Eacute;xito </span>';
}

?>
