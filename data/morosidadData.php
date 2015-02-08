<?php

include_once '../../domain/morosidad.php';
include_once '../../data/baseDatos.php';

class morosidadData {

    public $objConexionBaseDatos;

    //constructor
    public function morosidadData() {
        $this->objConexionBaseDatos = new baseDatos();
    }
    
    public function obtenerIdMorosidad() {
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select max(idMorosidad) from tbmorosidad;");
        $this->objConexionBaseDatos->cerrarConexion();
        if (mysqli_num_rows($resultado) != 0) {
            $id = mysqli_fetch_array($resultado);
            return ++$id[0];
        } else {
            return 1;
        }
    }

    //Metodo para insertar una morosidad
    public function insertarMorosidad($morosidad) {
        
        $query = "insert into tbmorosidad values (" . $this->obtenerIdMorosidad() . "," . $morosidad->idCliente . ",'".$morosidad->fechaMorosidad ."',". $morosidad->monto. ");";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($resultado) {
            return true;
        } else {
            return false;
                        
        }
        
    }
    

    //Metodo para eliminara una morosidad
    public function eliminarMorosidad($idMorosidad) {
        $query = "delete from tbmorosidad where idMorosidad=" . $idMorosidad . ";";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para Actualizar una morosidad
    public function actualizarMorosidad($morosidad) {
        $query = "update tbmorosidad set idCliente='" . $morosidad->idCliente. "', fechaMorosidad = '" 
                . $morosidad->fechaMorosidad."', monto = '" . $morosidad->monto.  "'  where idMorosidad=" . $morosidad->idMorosidad . " ;";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

     public function buscarMorosidad($idMorosidad) {
        $query = "select * from tbmorosidad where idMorosidad=" . $idMorosidad . ";";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $row = $resulGeneral->fetch_array();
        $morosidad = new morosidad($row['idMorosidad'], $row['idCliente'], $row['fechaMorosidad'], $row['monto']);
        $this->objConexionBaseDatos->cerrarConexion();
        return $morosidad;
    }
    
    //Metodo para obtener todos las morosidades
    public function obtenerMorosidades() {
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select * from tbmorosidad");
        $this->objConexionBaseDatos->cerrarConexion();
        $arrayMorosidad = [];

        while ($row = mysqli_fetch_array($resultado)) {
            $currentMorosidad= new morosidad($row['idMorosidad'], $row['idCliente'], $row['fechaMorosidad'], $row['monto']);
            array_push($arrayMorosidad, $currentMorosidad);
        }
        return $arrayMorosidad;
    }

    //Metodo para obtener todos las morosidades
    public function obtenerMorosidadesCliente($idCliente) {
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select * from tbmorosidad where idCliente=".$idCliente);
        $this->objConexionBaseDatos->cerrarConexion();
        $arrayMorosidad = [];

        while ($row = mysqli_fetch_array($resultado)) {
            $currentMorosidad= new morosidad($row['idMorosidad'], $row['idCliente'], $row['fechaMorosidad'], $row['monto']);
            array_push($arrayMorosidad, $currentMorosidad);
        }
        return $arrayMorosidad;
    }
    

}


