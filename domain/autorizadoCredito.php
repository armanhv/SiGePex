<?php

class autorizadoCredito {

    public $idAutorizadoCredito;
    public $idCredito;
    public $nombreAutorizado;  

    public function autorizadoCredito($idAutorizadoCredito, $idCredito, $nombreAutorizado) {
		  
        $this->idAutorizadoCredito = $idAutorizadoCredito;
        $this->idCredito = $idCredito;
        $this->nombreAutorizado = $nombreAutorizado;

  
    }

}
?>
