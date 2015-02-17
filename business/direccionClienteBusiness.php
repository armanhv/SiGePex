<?php

include_once "../../data/direccionClienteData.php";

class direccionClienteBusiness {

    //variables regarding composition
    private $direccionClienteData;

    public function direccionClienteBusiness() {
        $this->direccionClienteData = new direccionClienteData();
    }
   
    public function insertarDireccionCliente($objDireccionCliente) {
        $resultado = $this->direccionClienteData->insertarDireccionCliente($objDireccionCliente);
        return $resultado;
    }

    public function actualizarDireccionCliente($objDireccionCliente) {
        $resultado = $this->direccionClienteData->actualizarDireccionCliente($objDireccionCliente);
        return $resultado;
    }

    public function eliminarDireccionCliente($idDireccion) {
        $resultado = $this->direccionClienteData->eliminarDireccionCliente($idDireccion);
        return $resultado;
    }
    
    public function obtenerDireccionCliente() {
        $resultado = $this->direccionClienteData->obtenerDireccionCliente();
        return $resultado;
    }
    
    public function buscarDireccionCliente($idDireccion) {
        $direccionCliente = $this->direccionClienteData->buscarDireccionCliente($idDireccion);
        return $direccionCliente;
    }
    
     public function buscarDirecciones($idCliente) {
        $resultado = $this->direccionClienteData->buscarDirecciones($idCliente);
        return $resultado;
    }
    
    public function obtenerDirecciones($idCliente) {
        $resultado = $this->direccionClienteData->obtenerDirecciones($idCliente);
        return $resultado;
    }

}


