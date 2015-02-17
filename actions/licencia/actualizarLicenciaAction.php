<?php

include '../../business/licenciaBusiness.php';
$idLicencia= $_POST['idLicencia'];
$idEmpleado = $_POST['idEmpleado'];
$tipoLicencia = $_POST['tipoLicencia'];
$fechaEmisionLicencia = $_POST['fechaEmisionLicencia'];
$fechaExpiracionLicencia = $_POST['fechaExpiracionLicencia'];

$licencia=new licencia($idLicencia, $idEmpleado, $tipoLicencia, $fechaEmisionLicencia, $fechaExpiracionLicencia);
$licenciaB=new licenciaBusiness();
$resultado=$licenciaB->actualizarLicencia($licencia);

if($resultado){
      echo 'Se actualizo correactamente la licencia!';
}else{
      echo 'No se actualizo la licencia!';
}   
