<?php

include "../../data/pagoPeriodoData.php";

class pagoPeriodoBusiness {

    //variables regarding composition
    private $pagoPeriodoData;

    public function pagoPeriodoBusiness() {
        $this->pagoPeriodoData = new pagoPeriodoData();
    }

    public function insertarPagoPeriodo($pagoPeriodo) {
        $resultado = $this->pagoPeriodoData->insertarPagoPeriodo($pagoPeriodo);
        return $resultado;
    }

    public function actualizarPagoPeriodo($pagoPeriodo) {
        $resultado = $this->pagoPeriodoData->actualizarPagoPeriodo($pagoPeriodo);
        return $resultado;
    }

    public function eliminarPagoPeriodo($idPagoPeriodo) {
        $resultado = $this->pagoPeriodoData->eliminarPagoPeriodo($idPagoPeriodo);
        return $resultado;
    }

    public function buscarPagoPeriodo($idPagoPeriodo) {
        $resultado = $this->pagoPeriodoData->buscarPagoPeriodo($idPagoPeriodo);
        return $resultado;
    }

    public function obtenerPagos() {
        $resultado = $this->pagoPeriodoData->obtenerPagos();
        return $resultado;
    }

    public function obtenerEmpleadosPago() {
        $resultado = $this->pagoPeriodoData->obtenerEmpleadosPago();
        return $resultado;
    }

    public function buscarEmpleadoPago($idEmpleado) {
        $resultado = $this->pagoPeriodoData->buscarEmpleadoPago($idEmpleado);
        return $resultado;
    }

}
