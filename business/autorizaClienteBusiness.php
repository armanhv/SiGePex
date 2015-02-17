<?php

include_once "../../data/autorizaClienteData.php";

class autorizaClienteBusiness {

    //variables regarding composition
    private $autorizaClienteData;

    public function autorizaClienteBusiness() {
        $this->autorizaClienteData = new autorizaClienteData();
    }
   
    public function insertarAutorizaCliente($objAutorizaCliente) {
        $resultado = $this->autorizaClienteData->insertarAutorizaCliente($objAutorizaCliente);
        return $resultado;
    }

    public function actualizarAutorizaCliente($objAutorizaCliente) {
        $resultado = $this->autorizaClienteData->actualizarAutorizaCliente($objAutorizaCliente);
        return $resultado;
    }

    public function eliminarAutorizaCliente($idAutorizacionCliente) {
        $resultado = $this->autorizaClienteData->eliminarAutorizaCliente($idAutorizacionCliente);
        return $resultado;
    }
    
    public function obtenerAutorizaCliente() {
        $resultado = $this->autorizaClienteData->obtenerAutorizaCliente();
        return $resultado;
    }
    
    public function buscarAutorizaCliente($idAutorizacionCliente) {
        $autorizaCliente = $this->autorizaClienteData->buscarAutorizaCliente($idAutorizacionCliente);
        return $autorizaCliente;
    }
    
     public function buscarAutorizados($idCliente) {
        $resultado = $this->autorizaClienteData->buscarAutorizados($idCliente);
        return $resultado;
    }
    
    public function obtenerAutorizados($idCliente) {
        $resultado = $this->autorizaClienteData->obtenerAutorizados($idCliente);
        return $resultado;
    }

}
