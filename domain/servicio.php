<?php

class servicio {

    public $idServicio;
    public $idCliente;
    public $idEmpleado;
    public $idTipoServicio;
    public $descripcionServicio;
    public $fechaServicio;
    public $formaDePago;

    public function servicio($idServicio, $idCliente, $idEmpleado, $idTipoServicio, $descripcionServicio, $fechaServicio, $formaDePago) {
        $this->idServicio = $idServicio;
        $this->idCliente = $idCliente;
        $this->idEmpleado = $idEmpleado;
        $this->idTipoServicio = $idTipoServicio;
        $this->descripcionServicio = $descripcionServicio;
        $this->fechaServicio = $fechaServicio;
        $this->formaDePago = $formaDePago;
    }

}
