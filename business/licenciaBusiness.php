<?php

include_once '../../data/licenciaData.php';

class licenciaBusiness {

    //variables regarding composition
    private $licenciaData;

    public function licenciaBusiness() {
        $this->licenciaData = new licenciaData();
    }

    public function getIdLicencia() {
        $resultado = $this->licenciaData->getIdLicencia();
        return $resultado;
    }

    public function insertarLicencia($objLicenciaEmpleado) {
        $resultado = $this->licenciaData->insertarLicencia($objLicenciaEmpleado);
        return $resultado;
    }

    public function actualizarLicencia($objLicenciaEmleado) {
        $resultado = $this->licenciaData->actualizarLicencia($objLicenciaEmleado);
        return $resultado;
    }

    public function eliminarLicencia($idLicencia) {
        $resultado = $this->licenciaData->eliminarLicencia($idLicencia);
        return $resultado;
    }

    public function buscarLicencia($idLicencia) {
        $resultado = $this->licenciaData->buscarLicencia($idLicencia);
        return $resultado;
    }

    public function buscarLicenciasEmpleado($identificacionEmpleado) {
        $resultado = $this->licenciaData->buscarLicenciasEmpleado($identificacionEmpleado);
        return $resultado;
    }

    public function obtenerLicencias() {
        $resultado = $this->licenciaData->obtenerLicencias();
        return $resultado;
    }

}
