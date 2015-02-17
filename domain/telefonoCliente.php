<?php

class telefonoCliente{

    public $idTelefonoCliente;
    public $idCliente;
    public $numeroTelefono;
    

    public function telefonoCliente($idTelefonoCliente, $idClienteTelefono, $numeroTelefono) {
		
        $this->idTelefonoCliente=$idTelefonoCliente;
        $this->idCliente=$idClienteTelefono;
        $this->numeroTelefono = $numeroTelefono;
       
    }

}
