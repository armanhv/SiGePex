<?php

include_once '../../domain/rol.php';

class empleado {

    //variables
    public $idEmpleado;
    public $cedulaEmpleado;
    public $nombreEmpleado;
    public $primerApellidoEmpleado;
    public $segundoApellidoEmpleado;
    public $fechaNacimientoEmpleado;
    public $emailEmpleado;
    public $direccionEmpleado;
    public $loginEmpleado;
    public $passwordEmpleado;
    public $cantidadHorasLaborales;
    public $costoHoraExtra;
    public $tiempoAlmuerzo;
    public $objRol;

//Constructor method
    public function empleado($identificacionEmpleado, $cedulaEmpleado, $nombreEmpleado, $primerApellidoEmpleado, $segundoApellidoEmpleado, $fechaNacimientoEmpleado, $emailEmpleado, $direccionEmpleado, $loginEmpleado, $passwordEmpleado, $cantidadHorasLaborales, $costoHoraExtra, $tiempoAlmuerzo, $objRol) {
        $this->idEmpleado = $identificacionEmpleado;
        $this->cedulaEmpleado = $cedulaEmpleado;
        $this->nombreEmpleado = $nombreEmpleado;
        $this->primerApellidoEmpleado = $primerApellidoEmpleado;
        $this->segundoApellidoEmpleado = $segundoApellidoEmpleado;
        $this->fechaNacimientoEmpleado = $fechaNacimientoEmpleado;
        $this->emailEmpleado = $emailEmpleado;
        $this->direccionEmpleado = $direccionEmpleado;
        $this->loginEmpleado = $loginEmpleado;
        $this->passwordEmpleado = $passwordEmpleado;
        $this->cantidadHorasLaborales = $cantidadHorasLaborales;
        $this->costoHoraExtra = $costoHoraExtra;
        $this->tiempoAlmuerzo = $tiempoAlmuerzo;
        $this->objRol = $objRol;
    }

//End constructor method
    //metodo para imprimir el objeto
    public function toString() {
        $resultado = $this->idEmpleado . " " . $this->cedulaEmpleado . " " .
                $this->nombreEmpleado . " " . " " . $this->primerApellidoEmpleado . " " .
                $this->segundoApellidoEmpleado . " " . $this->fechaNacimientoEmpleado . " " .
                $this->emailEmpleado . " " . $this->direccionEmpleado . " " .
                $this->loginEmpleado . " " . $this->passwordEmpleado . " " .
                $this->cantidadHorasLaborales . " " . $this->costoHoraExtra . " " .
                $this->tiempoAlmuerzo . " " . $this->objRol->idRol;
        return $resultado;
    }

}
