<?php

class horario {

    //Atributos del objeto
    public $idHorario;
    public $idEmpleadoHorario;
    public $diaHorario;
    public $horaInicio;
    public $horaSalida;
    public $totalHoras;

    //Metodo constructor 
    public function horario($idHorario, $idEmpleadoHorario, $diaHorario, $horaInicio, $horaSalida, $totalHoras) {
        $this->idHorario = $idHorario;
        $this->idEmpleadoHorario = $idEmpleadoHorario;
        $this->diaHorario = $diaHorario;
        $this->horaInicio = $horaInicio;
        $this->horaSalida = $horaSalida;
        $this->totalHoras = $totalHoras;
    }

// fin metodo constructor
}
