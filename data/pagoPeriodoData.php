<?php

include 'baseDatos.php';
include '../../domain/pagoPeriodo.php';
include '../../domain/empleado.php';
include '../../utilidades/utilidadesGenerales.php';

class pagoPeriodoData {

    private $conexion;
    private $utilidad;

    public function pagoPeriodoData() {
        $this->conexion = new baseDatos();
        $this->utilidad = new utilidadesGenerales($this->conexion);
    }

    public function insertarPagoPeriodo($pagoPeriodo) {
        $query = "insert into tbpagoperiodo values (" . $this->utilidad->generarIdAutoIncremental('idpagoperiodo', 'tbpagoperiodo') . ", " . $pagoPeriodo->idEmpleado . ", '"
                . $pagoPeriodo->fechaInicioPeriodo . "', '" . $pagoPeriodo->fechaFinPeriodo . "', '"
                . $pagoPeriodo->salarioBasePeriodo . "', " . $pagoPeriodo->montoHorasExtra . ", "
                . $pagoPeriodo->rebajosPeriodo . ", '" . $pagoPeriodo->descripcionRebajo . "');";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarPagoPeriodo($pagoPeriodo) {
        $query = "update tbpagoperiodo set idEmpleado=" . $pagoPeriodo->idEmpleado . ", fechaInicoPeriodo= '" . $pagoPeriodo->fechaInicioPeriodo
                . "', fechaFinPeriodo= '" . $pagoPeriodo->fechaFinPeriodo . "', salarioBasePeriodo= " . $pagoPeriodo->salarioBasePeriodo
                . ", montoHorasExtra= " . $pagoPeriodo->montoHorasExtra . ", rebajosPeriodo= " . $pagoPeriodo->rebajosPeriodo
                . ", descripcionRebajo= '" . $pagoPeriodo->descripcionRebajo . "' where (idPagoPeriodo= " . $pagoPeriodo->idPagoPeriodo . ");";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarPagoPeriodo($idPagoPeriodo) {
        $query = "delete from tbpagoperiodo where idPagoPeriodo= " . $idPagoPeriodo;

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarPagoPeriodo($idPagoPeriodo) {
        $query = "SELECT * FROM tbpagoperiodo WHERE(idPagoPeriodo =" . $idPagoPeriodo . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $pagoPeriodo = new pagoPeriodo($row['idPagoPeriodo'], $row['idEmpleado'], $row['fechaInicoPeriodo'], $row['fechaFinPeriodo'], $row['salarioBasePeriodo'], $row['montoHorasExtra'], $row['rebajosPeriodo'], $row['descripcionRebajo']);

        $this->conexion->cerrarConexion();

        return $pagoPeriodo;
    }

    public function obtenerPagos() {
        $query = "select* from tbpagoperiodo";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayPagos = [];

        while ($row = mysqli_fetch_array($result)) {
            $pagoActual = new pagoPeriodo($row['idPagoPeriodo'], $row['idEmpleado'], $row['fechaInicoPeriodo'], $row['fechaFinPeriodo'], $row['salarioBasePeriodo'], $row['montoHorasExtra'], $row['rebajosPeriodo'], $row['descripcionRebajo']);
            array_push($arrayPagos, $pagoActual);
        }

        $this->conexion->cerrarConexion();

        return $arrayPagos;
    }

    public function obtenerEmpleadosPago() {
        $query = "select* from tbempleado";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayEmpleados = [];

        while ($row = mysqli_fetch_array($result)) {
            $empleadoActual = new empleado($row['idEmpleado'], $row['cedulaEmpleado'], $row['nombreEmpleado'], $row['primerApellidoEmpleado'], $row['segundoApellidoEmpleado'], $row['fechaNacimiento'], $row['emailEmpleado'], $row['direccionEmpleado'], $row['loginEmpleado'], $row['passwordEmpleado'], $row['cantidadHorasLaborales'], $row['costoHoraExtra'], $row['tiempoAlmuerzo'], $row['idRolEmpleado']);
            array_push($arrayEmpleados, $empleadoActual);
        }
        $this->conexion->cerrarConexion();
        return $arrayEmpleados;
    }

    public function buscarEmpleadoPago($idEmpleado) {
        $query = "SELECT * FROM tbempleado WHERE(idEmpleado =" . $idEmpleado . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $empleado = new empleado($row['idEmpleado'], $row['cedulaEmpleado'], $row['nombreEmpleado'], $row['primerApellidoEmpleado'], $row['segundoApellidoEmpleado'], $row['fechaNacimiento'], $row['emailEmpleado'], $row['direccionEmpleado'], $row['loginEmpleado'], $row['passwordEmpleado'], $row['cantidadHorasLaborales'], $row['costoHoraExtra'], $row['tiempoAlmuerzo'], $row['idRolEmpleado']);
        $this->conexion->cerrarConexion();
        return $empleado;
    }

}
