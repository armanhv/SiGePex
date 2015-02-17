<?php

class tipoPago {

    public $idTipoPago;
    public $nombreTipo;
    

    public function tipoPago($idTipoPago, $nombreTipo) {
        $this->idTipoPago = $idTipoPago;
        $this->nombreTipo = $nombreTipo;
        
    }

}