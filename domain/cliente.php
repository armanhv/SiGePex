<?php

class cliente {

    public $idCliente;
    public $nombreCliente;
    public $primerApellido;
    public $segundoApellido;
    public $direccion;
    
    

    public function cliente($idCliente,$nombreCliente, $primerApellido, $segundoApellido,$direccion) {
		
        
        $this->idCliente = $idCliente;
        $this->nombreCliente = $nombreCliente;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->direccion=$direccion;
        
        
  
    }

}
?>
