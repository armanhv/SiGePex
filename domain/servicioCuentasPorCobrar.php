<?php

class servicioCuentasPorCobrar {

    public $idServicio;
    public $idCuentasPorCobrarServicio;

    public function servicioCuentasPorCobrar($idServicio, $idCuentasPorCobrar) {
        $this->idServicio = $idServicio;
        $this->idCuentasPorCobrarServicio = $idCuentasPorCobrar;
    }

}
