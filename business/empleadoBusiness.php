<?php

include_once  "../../data/empleadoData.php";

class empleadoBusiness {

    //variables regarding composition
    private $empleadoData;

    public function empleadoBusiness() {
        $this->empleadoData = new empleadoData();
    }
    
    public function getIdEmpleado() {
        $resultado = $this->empleadoData->getIdEmpleado();
        return $resultado;
    }

    public function insertarEmpleado($empleado) {
        $resultado = $this->empleadoData->insertarEmpleado($empleado);
        return $resultado;
    }

    public function actualizarEmpleado($empleado) {
        $resultado = $this->empleadoData->actualizarEmpleado($empleado);
        return $resultado;
    }

    public function eliminarEmpleado($idEmpleado) {
        $resultado = $this->empleadoData->eliminarEmpleado($idEmpleado);
        return $resultado;
    }

    public function buscarEmpleado($idEmpleado) {
        $resultado = $this->empleadoData->buscarEmpleado($idEmpleado);
        return $resultado;
    }

    public function obtenerEmpleados() {
        $resultado = $this->empleadoData->obtenerEmpleados();
        return $resultado;
    }

}
