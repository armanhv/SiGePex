<?php

include "../../data/creditoData.php";

class creditoBusiness {

    //variables regarding composition
    private $creditoData;

    public function creditoBusiness() {
        $this->creditoData = new creditoData();
    }

    public function insertarCredito($objCredito) {
        $resultado = $this->creditoData->insertarCredito($objCredito);
        return $resultado;
    }

    public function actualizarCredito($objCredito) {
        $resultado = $this->creditoData->actualizarCredito($objCredito);
        return $resultado;
    }

    public function eliminarCredito($idCredito) {
        $resultado = $this->creditoData->eliminarCredito($idCredito);
        return $resultado;
    }

    public function obtenerCredito() {
        $resultado = $this->creditoData->obtenerCredito();
        return $resultado;
    }
    //BT
    public function obtenerCreditosCliente($idCliente) {
        $resultado = $this->creditoData->obtenerCreditosCliente($idCliente);
        return $resultado;
    }
    
    public function buscarCredito($idCredito) {
        $credito = $this->creditoData->buscarCredito($idCredito);
        return $credito;
    }
    
     public function buscarCreditosCliente($idCliente) {
        $resultado = $this->creditoData->buscarCreditosCliente($idCliente);
        return $resultado;
    }

}
