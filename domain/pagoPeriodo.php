<?php

class pagoPeriodo {

    public $idPagoPeriodo;
    public $idEmpleado;
    public $fechaInicioPeriodo;
    public $fechaFinPeriodo;
    public $salarioBasePeriodo;
    public $montoHorasExtra;
    public $rebajosPeriodo;
    public $descripcionRebajo;

    public function pagoPeriodo($idPagoPeriodo, $idEmpleado, $fechaInicoPeriodo, $fechaFinPeriodo, $salarioBasePeriodo, $montoHorasExtra, $rebajosPeriodo, $descripcionRebajo) {
        $this->idPagoPeriodo = $idPagoPeriodo;
        $this->idEmpleado = $idEmpleado;
        $this->fechaInicioPeriodo = $fechaInicoPeriodo;
        $this->fechaFinPeriodo = $fechaFinPeriodo;
        $this->salarioBasePeriodo = $salarioBasePeriodo;
        $this->montoHorasExtra = $montoHorasExtra;
        $this->rebajosPeriodo = $rebajosPeriodo;
        $this->descripcionRebajo = $descripcionRebajo;
    }

    public function toString() {
        echo 'PAGO: ' . $this->idPagoPeriodo . " EMP: " . $this->idEmpleado . " F INI: " . $this->fechaInicioPeriodo
        . " F FIN: " . $this->fechaFinPeriodo . " SAL B: " . $this->salarioBasePeriodo . " M EXTRA: " . $this->montoHorasExtra
        . " REBAJ: " . $this->rebajosPeriodo;
    }

}
