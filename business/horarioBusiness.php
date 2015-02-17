<?php

include '../../data/horarioData.php';

class horarioBusiness {

    //variables de composicion
    private $horarioData;

    //metoso constructor
    public function horarioBusiness() {
        $this->horarioData = new horarioData();
    }

    // metodo que se utiliza para insertar un horario
    public function insertHorario($horario) {
        $result = $this->horarioData->insertHorario($horario);
        return $result;
    }

    //metodo que se utiliza pra actualizar un horario
    public function updateHorario($horario) {
        $result = $this->horarioData->updateHorario($horario);
        return $result;
    }

    //metodo que se utiliza para eliminar un horario
    public function deleteHorario($idHorario) {
        $result = $this->horarioData->deleteHorario($idHorario);
        return $result;
    }

    //metodo que se utiliza para obtener todos los horarios
    public function getHorarios() {
        $restul = $this->horarioData->getHorarios();
        return $restul;
    }

    public function buscarHorario($idHorario) {
        $horario = $this->horarioData->buscarHorario($idHorario);
        return $horario;
    }

    public function buscarEmpleadoHorario($idEmpleado) {
        $empleado = $this->horarioData->buscarEmpleadoHorario($idEmpleado);
        return $empleado;
    }

    public function buscarHorarioDeEmpleado($idEmpleado) {
        $horario = $this->horarioData->buscarHorarioDeEmpleado($idEmpleado);
        return $horario;
    }

    public function obtenerUltimoID($idTabla, $tabla) {
        $horario = $this->horarioData->obtenerUltimoID($idTabla, $tabla);
        return $horario;
    }
}
