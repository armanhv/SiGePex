<?php

include "../../data/servicioCuentasPorCobrarData.php";

class servicioCuentasPorCobrarBusiness {

    public $servicioCuentasPorCobrar;

    public function servicioCuentasPorCobrarBusiness() {
        $this->servicioCuentasPorCobrar = new servicioCuentasPorCobrarData();
    }

    public function insertarServicioCuentasPorCobrar($objServicioCuentasPorCobrar) {
        $resultado = $this->servicioCuentasPorCobrar->insertarServicioCuentasPorCobrar($objServicioCuentasPorCobrar);
        return $resultado;
    }

    public function buscarServicioCuentasPorCobrar($idServicio) {
        $resultado = $this->servicioCuentasPorCobrar->buscarServicioCuentasPorCobrar($idServicio);
        return $resultado;
    }

    public function obtenerUltimoIDCuentasPorCobrar() {
        $id = $this->servicioCuentasPorCobrar->obtenerUltimoIDCuentasPorCobrar();
        return $id;
    }
    
    public function obtenerUltimoIDServicio() {
        $id = $this->servicioCuentasPorCobrar->obtenerUltimoIDServicio();
        return $id;
    }

}
