<?php

include "../../data/servicioIngresoData.php";

class servicioIngresoBusiness {

    public $servicioIngresos;

    public function servicioIngresoBusiness() {
        $this->servicioIngresos = new servicioIngresoData();
    }

     public function insertarServicioIngreso($objServicioIngresos) {
        $resultado = $this->servicioIngresos->insertarServicioIngresos($objServicioIngresos);
        return $resultado;
    }

    public function buscarServicioIngresos($idServicio) {
          $resultado = $this->servicioIngresos->buscarServicioIngresos($idServicio);
        return $resultado;
    }
    
     public function obtenerUltimoIDIngreso() {
        $id = $this->servicioIngresos->obtenerUltimoIDIngreso();
        return $id;
    }
    
    public function obtenerUltimoIDServicio() {
        $id = $this->servicioIngresos->obtenerUltimoIDServicio();
        return $id;
    }

}