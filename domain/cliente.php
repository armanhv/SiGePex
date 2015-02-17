<?php

class cliente {

    public $idCliente;
    public $nombreCliente;
    public $primerApellido;
    public $segundoApellido;

    public function cliente($idCliente, $nombreCliente, $primerApellido, $segundoApellido) {

        $this->idCliente = $idCliente;
        $this->nombreCliente = $nombreCliente;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
    }

}
