<?php

include "../../data/salarioData.php";

class salarioBusiness {

    //variables regarding composition
    private $salarioData;

    public function salarioBusiness() {
        $this->salarioData = new salarioData();
    }

    public function insertarSalario($salario) {
        $resultado = $this->salarioData->insertarSalario($salario);
        return $resultado;
    }

    public function actualizarSalario($salario) {
        $resultado = $this->salarioData->actualizarSalario($salario);
        return $resultado;
    }

    public function eliminarSalario($idSalario) {
        $resultado = $this->salarioData->eliminarSalario($idSalario);
        return $resultado;
    }

    public function obtenerSalarios() {
        $resultado = $this->salarioData->obtenerSalarios();
        return $resultado;
    }

    public function buscarSalario($idSalario) {
        $salario = $this->salarioData->buscarSalario($idSalario);
        return $salario;
    }

    public function buscarEmpleadoSalario($idEmpleado) {
        $resultado = $this->salarioData->buscarEmpleadoSalario($idEmpleado);
        return $resultado;
    }

    public function obtenerEmpleadosSalario() {
        $resultado = $this->salarioData->obtenerEmpleadosSalario();
        return $resultado;
    }
}
