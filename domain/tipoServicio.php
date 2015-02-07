<?php

class tipoServicio {

    public $idTipoServicio;
    public $nombreTipoServicio;
    public $precioTipoServicio;
    public $descripcionTipoServicio;

    public function tipoServicio($idTipoServicio, $nombreTipoServicio, $precioTipoServicio, $descripcionTipoServicio) {
        $this->idTipoServicio = $idTipoServicio;
        $this->nombreTipoServicio = $nombreTipoServicio;
        $this->precioTipoServicio = $precioTipoServicio;
        $this->descripcionTipoServicio = $descripcionTipoServicio;
    }

}
