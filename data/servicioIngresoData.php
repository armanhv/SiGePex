<?php

include_once '../../data/baseDatos.php';
include '../../domain/servicioIngreso.php';
include_once '../../utilidades/utilidadesGenerales.php';

class servicioIngresoData {

    public $conexion;
    public $utilidad;

    public function servicioIngresoData() {
        $this->conexion = new baseDatos();
        $this->utilidad = new utilidadesGenerales($this->conexion);
    }

    public function insertarServicioIngresos($objServicioIngresos) {

        $query = "INSERT INTO tbservicioingreso VALUES (" . $objServicioIngresos->idServicio . ", " . $objServicioIngresos->idIngreso . ");";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarServicioIngresos($idServicio) {
        $query = "SELECT * FROM tbservicioingreso WHERE idServicio =" . $idServicio . " ";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $servicioIngreso = new servicioIngreso($row['idServicio'], $row['idIngreso']);

        $this->conexion->cerrarConexion();
        return $servicioIngreso;
    }

    public function obtenerUltimoIDIngreso() {
        $id = $this->utilidad->generarIdAutoIncremental('idIngresos', 'tbingresos');

        return $id - 1;
    }

    public function obtenerUltimoIDServicio() {
        $id = $this->utilidad->generarIdAutoIncremental('idServicio', 'tbservicio');

        return $id - 1;
    }

}
