<?php

class telefono{

    public $idTelefono;
    public $identificacionEmpleadoTelefono;
    public $numeroTelefono;
    

    public function telefono($idTelefono, $identificacionEmpleadoTelefono, $numeroTelefono) {
		
        $this->idTelefono=$idTelefono;
        $this->identificacionEmpleadoTelefono=$identificacionEmpleadoTelefono;
        $this->numeroTelefono = $numeroTelefono;
       
    }

}
