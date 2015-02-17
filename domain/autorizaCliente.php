<?php

class autorizaCliente {

    public $idAutorizacionCliente;
    public $idCliente;
    public $nombreAutorizado;  

    public function autorizaCliente($idAutorizacionCliente, $idCliente, $nombreAutorizado) {
		  
        $this->idAutorizacionCliente = $idAutorizacionCliente;
        $this->idCliente = $idCliente;
        $this->nombreAutorizado = $nombreAutorizado;

  
    }

}
?>
