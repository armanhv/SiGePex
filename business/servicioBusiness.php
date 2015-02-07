<?php

include "../../data/servicioData.php";

class servicioBusines {

//variables regarding composition
    private $servicioData;

    public function servicioBusines() {
        $this->servicioData = new servicioData();
    }

    public function insertarServicio($servicio) {
        $resultado = $this->servicioData->insertarServicio($servicio);
        return $resultado;
    }

    public function actualizarServicio($servicio) {
        $resultado = $this->servicioData->actualizarServicio($servicio);
        return $resultado;
    }

    public function eliminarServicio($idServicio) {
        $resultado = $this->servicioData->eliminarServicio($idServicio);
        return $resultado;
    }

    public function obtenerServicios() {
        $resultado = $this->servicioData->obtenerServicios();
        return $resultado;
    }

    public function buscarServicio($idServicio) {
        $salario = $this->servicioData->buscarServicio($idServicio);
        return $salario;
    }
}
