<?php

class morosidad {

    //Atributos del objeto
    public $idMorosidad;
    public $idCliente;
    public $fechaMorosidad;
    public $monto;
    
    public function morosidad($idMorosidad, $idCliente,$fechaMorosidad,$monto) {
        $this->idMorosidad = $idMorosidad;
        $this->idCliente = $idCliente;
        $this->fechaMorosidad = $fechaMorosidad;
        $this->monto = $monto;
    }

}

