<?php

include '../../business/licenciaBusiness.php';
$idLicencia = $_POST['id'];
$licenciaBusiness=new licenciaBusiness();
$resultado = $licenciaBusiness->eliminarLicencia($idLicencia);
        
if($resultado){
      echo 'Se elimino correactamente la licencia!';
}else{
      echo 'No se elimino la licencia!';
}
    