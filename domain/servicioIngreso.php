<?php

class servicioIngreso {

    public $idServicio;
    public $idIngreso;

    public function servicioIngreso($idServicio, $idIngreso) {
        $this->idServicio=$idServicio;
        $this->idIngreso=$idIngreso;
    }

}
