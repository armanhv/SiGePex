<?php

include '../../data/morosidadData.php';

class morosidadBusiness {

    //variables de composicion
    private $morosidadData;

    //metoso constructor
    public function morosidadBusiness() {
        $this->morosidadData = new morosidadData();
    }

    // metodo que se utiliza para insertar una morosidad
    public function insertarMorosidad($morosidad) {
        $resultado = $this->morosidadData->insertarMorosidad($morosidad);
        return $resultado;
    }

    //metodo que se utiliza pra actualizar una morosidad
    public function actualizarMorosidad($morosidad) {        
        $resultado = $this->morosidadData->actualizarMorosidad($morosidad);
        return $resultado;
    }

    //metodo que se utiliza para eliminar una morosidad
    public function eliminarMorosidad($idMorosidad) {
        $resultado = $this->morosidadData->eliminarMorosidad($idMorosidad);
        return $resultado;
    }
    
    //metodo que se utiliza para obtener todos las morosidades
    public function obtenerMorosidades() {
        $resultado = $this->morosidadData->obtenerMorosidades();
        return $resultado;
    }
    //metodo que se utiliza para obtener todos las morosidades
    public function obtenerMorosidadesCliente($idCliente) {
        $resultado = $this->morosidadData->obtenerMorosidadesCliente($idCliente);
        return $resultado;
    }
    
     public function buscarMorosidad($idMorosidad) {
        $resultado = $this->morosidadData->buscarMorosidad($idMorosidad);
        return $resultado;
    }
    
    public function obtenerMorosidadesRangoFechas($fechaInicio,$fechaFinal){
         $resultado = $this->morosidadData->obtenerMorosidadesRangoFechas($fechaInicio,$fechaFinal);
        return $resultado;
    }
}


