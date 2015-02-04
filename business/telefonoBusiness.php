<?php

include "../../data/telefonoData.php";

class telefonoBusiness {

    //variables regarding composition
    private $telefonoData;

    public function telefonoBusiness() {
        $this->telefonoData = new telefonoData();
    }

    public function insertarTelefono($objTelefono) {
        $resultado = $this->telefonoData->insertarTelefono($objTelefono);
        return $resultado;
    }

    public function actualizarTelefono($objTelefono) {
        $resultado = $this->telefonoData->actualizarTelefono($objTelefono);
        return $resultado;
    }

    public function eliminarTelefono($idTelefono) {
        $resultado = $this->telefonoData->eliminarTelefono($idTelefono);
        return $resultado;
    }

    public function obtenerTelefono() {
        $resultado = $this->telefonoData->obtenerTelefono();
        return $resultado;
    }
    
    public function buscarTelefono($idTelefono) {
        $telefono = $this->telefonoData->buscarTelefono($idTelefono);
        return $telefono;
    }
    
     public function buscarTelefonosEmpleado($idEmpleado) {
        $resultado = $this->telefonoData->buscarTelefonosEmpleado($idEmpleado);
        return $resultado;
    }

}
?>
