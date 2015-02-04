<?php

class cuentasPorCobrar {

    //Atributos del objeto
    public $idCuentasPorCobrar;
    public $idEmpleado;
    public $idCliente;
    public $fechaPago;
    public $monto;

    //Metodo constructor 
    public function cuentasPorCobrar ($idCuentasPorCobrar, $idEmpleado, $idCliente, $fechaPago, $monto) {
        $this->idCuentasPorCobrar = $idCuentasPorCobrar;
        $this->idEmpleado = $idEmpleado;
        $this->idCliente = $idCliente;
        $this->fechaPago = $fechaPago;
        $this->monto = $monto;
    }

// fin metodo constructor
}


