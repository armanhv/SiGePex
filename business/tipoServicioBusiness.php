<?php

include "../data/tipoServicioData.php";

class tipoServicioBusines {

//variables regarding composition
    private $tipoServicioData;

    public function tipoServicioBusines() {
        $this->tipoServicioData = new tipoServicioData();
    }

    public function insertarTipoServicio($tipoServicio) {
        $resultado = $this->tipoServicioData->insertarTipoServicio($tipoServicio);
        return $resultado;
    }

    public function actualizarTipoServicio($tipoServicio) {
        $resultado = $this->tipoServicioData->actualizarTipoServicio($tipoServicio);
        return $resultado;
    }

    public function eliminarTipoServicio($idtipoServicio) {
        $resultado = $this->tipoServicioData->eliminarTipoServicio($idTipoServicio);
        return $resultado;
    }

    public function obtenerTipoServicios() {
        $resultado = $this->tipoServicioData->obtenerTipoServicios();
        return $resultado;
    }

    public function buscarTipoServicio($idTipoServicio) {
        $salario = $this->tipoServicioData->buscarTipoServicio($idTipoServicio);
        return $salario;
    }

}
