<?php

include_once "../../data/clienteData.php";

class clienteBusiness {

    //variables regarding composition
    private $clienteData;

    public function clienteBusiness() {
        $this->clienteData = new clienteData();
    }

    public function insertarCliente($cliente) {
        $resultado = $this->clienteData->insertarCliente($cliente);
        return $resultado;
    }

    public function actualizarCliente($cliente) {
        $resultado = $this->clienteData->actualizarCliente($cliente);
        return $resultado;
    }

    public function eliminarCliente($idCliente) {
        $resultado = $this->clienteData->eliminarCliente($idCliente);
        return $resultado;
    }

    public function obtenerCliente() {
        $resultado = $this->clienteData->obtenerCliente();
        return $resultado;
    }
    
    public function buscarCliente($idCliente) {
        $cliente = $this->clienteData->buscarCliente($idCliente);
        return $cliente;
    }
    
     

}
