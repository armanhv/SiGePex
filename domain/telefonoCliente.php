<?php

class telefono{

    public $idTelefonoCliente;
    public $idCliente;
    public $numeroTelefono;
    

    public function telefono($idTelefonoCliente, $idClienteTelefono, $numeroTelefono) {
		
        $this->idTelefonoCliente=$idTelefonoCliente;
        $this->idCliente=$idClienteTelefono;
        $this->numeroTelefono = $numeroTelefono;
       
    }

}
