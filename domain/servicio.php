<?php

class servicio {

    public $idServicio;
    public $idCliente;
    public $idEmpleado;
    public $idTipoServicio;
    public $descripcionServicio;
    public $fechaServicio;
    public $formaDePago;
    public $cargosExtra;
    public $total;

    public function servicio($idServicio, $idCliente, $idEmpleado, $idTipoServicio, $descripcionServicio, $fechaServicio, $formaDePago,$cargosExtra, $total) {
        $this->idServicio = $idServicio;
        $this->idCliente = $idCliente;
        $this->idEmpleado = $idEmpleado;
        $this->idTipoServicio = $idTipoServicio;
        $this->descripcionServicio = $descripcionServicio;
        $this->fechaServicio = $fechaServicio;
        $this->formaDePago = $formaDePago;
        $this->cargosExtra = $cargosExtra;
        $this->total = $total;
    }

}
