<?php

class direccionCliente {

    public $idDireccion;
    public $idCliente;
    public $direccion;  

    public function direccionCliente($idDireccion, $idCliente, $direccion) {
		  
        $this->idDireccion = $idDireccion;
        $this->idCliente = $idCliente;
        $this->direccion = $direccion;

    }

}
?>
