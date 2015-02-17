<?php

class salario {

    public $idSalario;
    public $idEmpleado;
    public $salarioBase;
    public $horasExtraSalario;
    public $bonificacionesSalario;
    public $diasExtraSalario;

    public function salario($idSalario, $idEmpleado, $salarioBase, $horasExtraSalario, $bonificacionesSalario, $diasExtraSalario) {
        $this->idSalario = $idSalario;
        $this->idEmpleado = $idEmpleado;
        $this->salarioBase = $salarioBase;
        $this->horasExtraSalario = $horasExtraSalario;
        $this->bonificacionesSalario = $bonificacionesSalario;
        $this->diasExtraSalario = $diasExtraSalario;
  
    }

}
