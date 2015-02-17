<?php

class cuenta {

    public $idCuenta;
    public $idEmpleado;
    public $numeroCuenta;
    public $idBanco;
    public $tipoCuenta;
    public $numeroSimpe;

    public function cuenta($idCuenta, $numeroCuenta, $idBanco, $tipoCuenta, $numeroSimpe, $idEmpleado) {
        $this->idCuenta = $idCuenta;
        $this->numeroCuenta = $numeroCuenta;
        $this->idBanco = $idBanco;
        $this->tipoCuenta = $tipoCuenta;
        $this->numeroSimpe = $numeroSimpe;
        $this->idEmpleado = $idEmpleado;
    }

}