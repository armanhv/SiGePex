<?php

include_once '../../business/licenciaBusiness.php';
$idEmpleado = $_POST['idEmpleado'];
$tipoLicencia = $_POST['tipoLicencia'];
$fechaEmisionLicencia = $_POST['fechaEmisionLicencia'];
$fechaExpiracionLicencia = $_POST['fechaExpiracionLicencia'];

$licencia=new licencia(0, $idEmpleado, $tipoLicencia, $fechaEmisionLicencia, $fechaExpiracionLicencia);
$licenciaB=new licenciaBusiness();
$resultado=$licenciaB->insertarLicencia($licencia);

if($resultado){
      echo 'Se inserto correactamente la licencia!';
}else{
      echo 'No se inserto la licencia!';
}
    