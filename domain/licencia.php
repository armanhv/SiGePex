<?php

class licencia {
    
    public $idLicencia;
    public $idEmpleado;
    public $tipoLicencia;
    public $fechaEmisionLicencia;
    public $fechaExpiracionLicencia;

    public function licencia($idLicencia,$idEmpleado,$tipoLicencia, $fechaEmisionLicencia, $fechaExpiracionLicencia) {
        $this->idLicencia=$idLicencia;
        $this->idEmpleado=$idEmpleado;
        $this->tipoLicencia=$tipoLicencia;
        $this->fechaEmisionLicencia=$fechaEmisionLicencia;
        $this->fechaExpiracionLicencia=$fechaExpiracionLicencia;        
    }
}
