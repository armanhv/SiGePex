<?php
include_once '../../data/telefonoClienteData.php';
class telefonoClienteBusiness {
    //variables regarding composition
    private $telefonoClienteData;

    public function telefonoClienteBusiness() {        
        $this->telefonoClienteData=new telefonoClienteData();
    }

    public function insertarTelefono($objTelefono) {
        $resultado = $this->telefonoClienteData->insertarTelefono($objTelefono);
        return $resultado;
    }

    public function actualizarTelefono($objTelefono) {
        $resultado = $this->telefonoClienteData->actualizarTelefono($objTelefono);
        return $resultado;
    }

    public function eliminarTelefono($idTelefono) {
        $resultado = $this->telefonoClienteData->eliminarTelefono($idTelefono);
        return $resultado;
    }

    public function obtenerTelefono() {
        $resultado = $this->telefonoClienteData->obtenerTelefono();
        return $resultado;
    }
    
    public function buscarTelefono($idTelefono) {
        $telefono = $this->telefonoClienteData->buscarTelefono($idTelefono);
        return $telefono;
    }
    
     public function buscarTelefonosCliente($idCliente) {
        $resultado =  $this->telefonoClienteData->buscarTelefonosCliente($idCliente);
        return $resultado;
    }
    
}
