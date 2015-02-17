<?php
include '../../business/empleadoBusiness.php';
$idEmpleado = $_POST['idEmpleado'];
$empleadoBusiness=new EmpleadoBusiness();
$resultado = $empleadoBusiness->eliminarEmpleado($idEmpleado);
        
if($resultado){
      echo 'Se elimino correactamente!';
}else{
      echo 'No se elimino!';
}
    

