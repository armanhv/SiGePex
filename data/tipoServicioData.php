<?php

include_once 'baseDatos.php';
include '../../domain/tipoServicio.php';
include_once '../../utilidades/utilidadesGenerales.php';

class tipoServicioData {

    private $conexion;
    private $utilidad;

    public function tipoServicioData() {
        $this->conexion = new baseDatos();
        $this->utilidad = new utilidadesGenerales($this->conexion);
    }

    public function insertarTipoServicio($tipoServicio) {

        $query = "insert into tbtiposervicio values (" . $this->utilidad->generarIdAutoIncremental('idTipoServicio', 'tbtiposervicio')
                . ", '" . $tipoServicio->nombreTipoServicio . "', " . $tipoServicio->precioTipoServicio . ", '" . $tipoServicio->descripcionTipoServicio . "');";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarTipoServicio($tipoServicio) {

        $query = "update tbtiposervicio set nombreTipoServicio='" . $tipoServicio->nombreTipoServicio
                . "', precioTipoServicio=" . $tipoServicio->precioTipoServicio
                . ", descripcionTipoServicio='" . $tipoServicio->descripcionTipoServicio
                . "' where (idTipoServicio=" . $tipoServicio->idTipoServicio . ");";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarTipoServicio($idTipoServicio) {
        $query = "delete from tbtiposervicio where idTipoServicio=" . $idTipoServicio . ";";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerTipoServicios() {

        // tbtiposervicio   idTipoServicio`, `nombreTipoServicio`, `precioTipoServicio`, `descripcionTipoServicio
        $query = "select* from tbtiposervicio";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayTipoServicios = [];

        while ($row = mysqli_fetch_array($result)) {
            $tipoServicioActual = new tipoServicio($row['idTipoServicio'], $row['nombreTipoServicio'], $row['precioTipoServicio'], $row['descripcionTipoServicio']);
            array_push($arrayTipoServicios, $tipoServicioActual);
        }

        $this->conexion->cerrarConexion();

        return $arrayTipoServicios;
    }

    public function buscarTipoServicio($idTipoServicio) {
        $query = "SELECT * FROM tbtiposervicio WHERE(idTipoServicio =" . $idTipoServicio . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $tipoServicio = new tipoServicio($row['idTipoServicio'], $row['nombreTipoServicio'], $row['precioTipoServicio'], $row['descripcionTipoServicio']);

        $this->conexion->cerrarConexion();

        return $tipoServicio;
    }

}
