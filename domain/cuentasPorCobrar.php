<?php

class cuentasPorCobrar {

    //Atributos del objeto
    public $idCuentasPorCobrar;
    public $idEmpleado;
    public $idCliente;
    public $monto;

    //Metodo constructor 
    public function cuentasPorCobrar ($idCuentasPorCobrar, $idEmpleado, $idCliente, $monto) {
        $this->idCuentasPorCobrar = $idCuentasPorCobrar;
        $this->idEmpleado = $idEmpleado;
        $this->idCliente = $idCliente;
        $this->monto = $monto;
    }

// fin metodo constructor
}


