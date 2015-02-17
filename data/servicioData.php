<?php

include_once 'baseDatos.php';
include '../../domain/servicio.php';
include '../../domain/empleado.php';
include_once '../../utilidades/utilidadesGenerales.php';

class servicioData {

    private $conexion;
    private $utilidad;

    public function servicioData() {
        $this->conexion = new baseDatos();
        $this->utilidad = new utilidadesGenerales($this->conexion);
    }

    public function insertarServicio($servicio) {

        $query = "insert into tbservicio values (" . $this->utilidad->generarIdAutoIncremental('idServicio', 'tbservicio') . ", " . $servicio->idCliente . ", "
                . $servicio->idEmpleado . ", " . $servicio->idTipoServicio . ", '" . $servicio->descripcionServicio . "', '"
                . $servicio->fechaServicio . "', '" . $servicio->formaDePago . "'," . $servicio->cargosExtra . "," . $servicio->total . ", "
                . $servicio->estadoServicio . ", '" . $servicio->descripcionCargoExtra . "');";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarServicio($servicio) {

        $query = "update tbservicio set idCliente=" . $servicio->idCliente . ", idEmpleado=" . $servicio->idEmpleado
                . ", idTipoServicio=" . $servicio->idTipoServicio . ", descripcionServicio='" . $servicio->descripcionServicio
                . "', fechaServicio='" . $servicio->fechaServicio . "', formaDePago='" . $servicio->formaDePago
                . "', cargosExtra=" . $servicio->cargosExtra . ", total=" . $servicio->total . ", estadoServicio=" . $servicio->estadoServicio
                . ", descripcionCargoExtra='" . $servicio->descripcionCargoExtra . "' where (idServicio=" . $servicio->idServicio . ");";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarServicio($idServicio) {
        $query = "delete from tbservicio where idServicio=" . $idServicio . ";";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerServicios() {

        $query = "select* from tbservicio";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayServicios = [];

        while ($row = mysqli_fetch_array($result)) {
            $servicioActual = new servicio($row['idServicio'], $row['idCliente'], $row['idEmpleado'], $row['idTipoServicio'], $row['descripcionServicio'], $row['fechaServicio'], $row['formaDePago'], $row['cargosExtra'], $row['total'], $row['estadoServicio'], $row['descripcionCargoExtra']);
            array_push($arrayServicios, $servicioActual);
        }

        $this->conexion->cerrarConexion();

        return $arrayServicios;
    }

    public function buscarServicio($idServicio) {
        $query = "SELECT * FROM tbservicio WHERE(idServicio =" . $idServicio . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $servicio = new servicio($row['idServicio'], $row['idCliente'], $row['idEmpleado'], $row['idTipoServicio'], $row['descripcionServicio'], $row['fechaServicio'], $row['formaDePago'], $row['cargosExtra'], $row['total'], $row['estadoServicio'], $row['descripcionCargoExtra']);

        $this->conexion->cerrarConexion();

        return $servicio;
    }

    public function obtenerEmpleadosConServicios() {
        $query = "SELECT * FROM tbempleado WHERE idEmpleado IN ( SELECT idEmpleado FROM tbservicio WHERE estadoServicio = 0)";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayEmpleados = [];

        while ($row = mysqli_fetch_array($result)) {
            $empleadoActual = new empleado($row['idEmpleado'], $row['cedulaEmpleado'], $row['nombreEmpleado'], $row['primerApellidoEmpleado'], $row['segundoApellidoEmpleado'], $row['fechaNacimiento'], $row['emailEmpleado'], $row['direccionEmpleado'], $row['loginEmpleado'], $row['passwordEmpleado'], $row['cantidadHorasLaborales'], $row['costoHoraExtra'], $row['tiempoAlmuerzo'], $row['idRolEmpleado']);
            array_push($arrayEmpleados, $empleadoActual);
        }
        $this->conexion->cerrarConexion();
        return $arrayEmpleados;
    }

    public function obtenerServiciosDeEmpleado($idEmpleado) {

        $query = "SELECT * FROM tbservicio WHERE idEmpleado=" . $idEmpleado;
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayServicios = [];

        while ($row = mysqli_fetch_array($result)) {
            $servicioActual = new servicio($row['idServicio'], $row['idCliente'], $row['idEmpleado'], $row['idTipoServicio'], $row['descripcionServicio'], $row['fechaServicio'], $row['formaDePago'], $row['cargosExtra'], $row['total'], $row['estadoServicio'], $row['descripcionCargoExtra']);
            array_push($arrayServicios, $servicioActual);
        }

        $this->conexion->cerrarConexion();

        return $arrayServicios;
    }

    public function actualizarEstadoServicio($idServicio) {

        $query = "UPDATE tbservicio SET estadoServicio = 1 WHERE idServicio =" . $idServicio;

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

}