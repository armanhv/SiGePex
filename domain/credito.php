<?php

class credito{

    public $idCredito;
    public $idCliente;
    public $montoLimite;
    public $fechaPagoLimite;
    

    public function credito($idCredito,$idCliente, $montoLimite, $fechaPagoLimite) {
	
       $this->idCredito=$idCredito;
        $this->idCliente=$idCliente;
        $this->montoLimite=$montoLimite;
        $this->fechaPagoLimite = $fechaPagoLimite;
       
    }

}
