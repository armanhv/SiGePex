<?php

include "../../data/cuentaData.php";

class cuentaBusiness {

    //variables regarding composition
    private $cuentaData;

    public function cuentaBusiness() {
        $this->cuentaData = new cuentaData();
    }

    public function insertarCuenta($cuenta) {
        $resultado = $this->cuentaData->insertarCuenta($cuenta);
        return $resultado;
    }

    public function actualizarCuenta($cuenta) {
        $resultado = $this->cuentaData->actualizarCuenta($cuenta);
        return $resultado;
    }

    public function eliminarCuenta($idCuenta) {
        $resultado = $this->cuentaData->eliminarCuenta($idCuenta);
        return $resultado;
    }

    public function obtenerCuentas() {
        $resultado = $this->cuentaData->obtenerCuentas();
        return $resultado;
    }
    
    public function buscarCuenta($idCuenta) {
        $cuenta = $this->cuentaData->buscarCuenta($idCuenta);
        return $cuenta;
    }
    
     public function buscarEmpleadoCuenta($idEmpleado) {
        $resultado = $this->cuentaData->buscarEmpleadoCuenta($idEmpleado);
        return $resultado;
    }

}
?>
