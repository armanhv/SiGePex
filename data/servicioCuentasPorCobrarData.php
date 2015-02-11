<?php

include_once '../../data/baseDatos.php';
include '../../domain/servicioCuentasPorCobrar.php';
include_once '../../utilidades/utilidadesGenerales.php';

class servicioCuentasPorCobrarData {

    //Variables 
    private $conexion;
    private $utilidad;

    public function servicioCuentasPorCobrarData() {
        $this->conexion = new baseDatos();
        $this->utilidad = new utilidadesGenerales($this->conexion);
    }

    public function insertarServicioCuentasPorCobrar($objServicioCuentasPorCobrar) {

        $query = "INSERT INTO tbserviciocuentasporcobrar VALUES (" . $objServicioCuentasPorCobrar->idServicio . ", " . $objServicioCuentasPorCobrar->idCuentasPorCobrarServicio . ");";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarServicioCuentasPorCobrar($idServicio) {
        $query = "SELECT * FROM tbserviciocuentasporcobrar WHERE idServicio =" . $idServicio . " ";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $servicioCuentasPorCobrar = new servicioCuentasPorCobrar($row['idServicio'], $row['idCuentasPorCobrar']);

        $this->conexion->cerrarConexion();
        return $servicioCuentasPorCobrar;
    }

    public function obtenerUltimoIDCuentasPorCobrar() {
        $id = $this->utilidad->generarIdAutoIncremental('idCuentasPorCobrar', 'tbcuentasporcobrar');

        return $id - 1;
    }

    public function obtenerUltimoIDServicio() {
        $id = $this->utilidad->generarIdAutoIncremental('idServicio', 'tbservicio');

        return $id - 1;
    }

}
