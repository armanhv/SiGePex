<?php

include_once "../../data/autorizadoCreditoData.php";

class autorizadoCreditoBusiness {

    //variables regarding composition
    private $autorizadoCreditoData;

    public function autorizadoCreditoBusiness() {
        $this->autorizadoCreditoData = new autorizadoCreditoData();
    }
public function insertarAutorizadoCredito($objAutorizadoCredito) {
        $resultado = $this->autorizaClienteData->insertarAutorizadoCredito($objAutorizadoCredito);
        return $resultado;
    }

    public function actualizarAutorizadoCredito($objAutorizadoCredito) {
        $resultado = $this->autorizaClienteData->actualizarAutorizadoCredito($objAutorizadoCredito);
        return $resultado;
    }

    public function eliminarAutorizadoCredito($idAutorizadoCredito) {
        $resultado = $this->autorizaClienteData->eliminarAutorizadoCredito($idAutorizadoCredito);
        return $resultado;
    }
    
    public function obtenerAutorizadoCredito() {
        $resultado = $this->autorizaClienteData->obtenerAutorizadoCredito();
        return $resultado;
    }
    
    public function buscarAutorizadoCredito($idAutorizadoCredito) {
        $autorizadoCredito = $this->autorizaClienteData->buscarAutorizadoCredito($idAutorizadoCredito);
        return $autorizadoCredito;
    }
    //buscarautorizados
     public function buscarAutorizadosCliente($idCliente) {
        $resultado = $this->autorizaClienteData->buscarAutorizadosClientes($idCliente);
        return $resultado;
    }
    
    public function obtenerAutorizadosClientes($idCliente) {
        $resultado = $this->autorizaClienteData->obtenerAutorizadosClientes($idCliente);
        return $resultado;
    }
    
    public function buscarCliente($idAutorizadoCredito) {
        $autorizadoCredito = $this->autorizadoCreditoData->buscarCliente($idAutorizadoCredito);
        return autorizadoCredito;
    }

}
