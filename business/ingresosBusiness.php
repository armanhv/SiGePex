<?php

include_once "../../data/ingresosData.php";

class ingresosBusiness {

    //variables regarding composition
    private $ingresosData;

    public function ingresosBusiness() {
        $this->ingresosData = new ingresosData();
    }

    public function insertarIngreso($ingresos) {
        $resultado = $this->ingresosData->insertarIngreso($ingresos);
        return $resultado;
    }

    public function actualizarIngresos($ingresos) {
        $resultado = $this->ingresosData->actualizarIngresos($ingresos);
        return $resultado;
    }

    public function eliminarIngresos($idIngresos) {
        $resultado = $this->ingresosData->eliminarIngresos($idIngresos);
        return $resultado;
    }

    public function obtenerIngresos() {
        $resultado = $this->ingresosData->obtenerIngresos();
        return $resultado;
    }
    
    public function buscarIngresos($idIngresos) {
        $ingresos = $this->ingresosData->buscarIngresos($idIngresos);
        return $ingresos;
    }
    
    public function buscarEmpleado($idEmpleado) {
        $empleado = $this->ingresosData->buscarEmpleado($idEmpleado);
        return $cliente;
    }
    public function buscarCliente($idCliente) {
        $cliente = $this->ingresosData->buscarCliente($idCliente);
        return $cliente;
    }
    public function buscarTipoPago($idTipoPago) {
        $tipoPago = $this->ingresosData->buscarTipoPago($idTipoPago);
        return $tipoPago;
    } 
    public function obtenerTipoPago() {
        $resultado = $this->ingresosData->obtenerTipoPago();
        return $resultado;
    } 

}
