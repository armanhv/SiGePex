<?php

include_once '../../data/baseDatos.php';
include_once '../../domain/empleado.php';
include_once '../../utilidades/utilidadesGenerales.php';

class empleadoData {

    private $conexion;
    private $utilidad;

    public function empleadoData() {
        $this->conexion = new baseDatos();
        $this->utilidad = new utilidadesGenerales($this->conexion);
    }

    public function insertarEmpleado($empleado) {
        $query = "insert into tbempleado values (" . $this->utilidad->generarIdAutoIncremental('idEmpleado', 'tbempleado') . ",'" . $empleado->cedulaEmpleado . "', '" . $empleado->nombreEmpleado . "', '"
                . $empleado->primerApellidoEmpleado . "', '" . $empleado->segundoApellidoEmpleado . "', '" . $empleado->fechaNacimientoEmpleado . "', '"
                . $empleado->emailEmpleado . "', '" . $empleado->direccionEmpleado . "', '" . $empleado->loginEmpleado . "', '"
                . $empleado->passwordEmpleado . "'," . $empleado->cantidadHorasLaborales . "," . $empleado->costoHoraExtra . ", "
                . $empleado->tiempoAlmuerzo . "," . $empleado->objRol->idRol . ");";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $this->conexion->cerrarConexion();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarEmpleado($empleado) {

        $query = "update tbempleado set cedulaEmpleado='" . $empleado->cedulaEmpleado . "', nombreEmpleado='" . $empleado->nombreEmpleado . "', primerApellidoEmpleado= '"
                . $empleado->primerApellidoEmpleado . "', segundoApellidoEmpleado= '" . $empleado->segundoApellidoEmpleado . "', fechaNacimiento= '"
                . $empleado->fechaNacimientoEmpleado . "', emailEmpleado= '" . $empleado->emailEmpleado . "', direccionEmpleado= '" . $empleado->direccionEmpleado
                . "', loginEmpleado='" . $empleado->loginEmpleado . "', passwordEmpleado='" . $empleado->passwordEmpleado
                . "', cantidadHorasLaborales=" . $empleado->cantidadHorasLaborales . ", costoHoraExtra=" . $empleado->costoHoraExtra . ", tiempoAlmuerzo=" . $empleado->tiempoAlmuerzo
                . ", idRolEmpleado=" . $empleado->objRol->idRol . " where idEmpleado=" . $empleado->idEmpleado . ";";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarEmpleado($idEmpleado) {
        $query = "delete from tbempleado where idEmpleado=" . $idEmpleado . ";";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $this->conexion->cerrarConexion();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarEmpleado($identificacionEmpleado) {
        $query = "select* from tbempleado where(idEmpleado =" . $identificacionEmpleado . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $empleado = new empleado($row['idEmpleado'], $row['cedulaEmpleado'], $row['nombreEmpleado'], $row['primerApellidoEmpleado'], $row['segundoApellidoEmpleado'], $row['fechaNacimiento'], $row['emailEmpleado'], $row['direccionEmpleado'], $row['loginEmpleado'], $row['passwordEmpleado'], $row['cantidadHorasLaborales'], $row['costoHoraExtra'], $row['tiempoAlmuerzo'], $row['idRolEmpleado']);

        $this->conexion->cerrarConexion();
        return $empleado;
    }

    public function obtenerEmpleados() {
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

}
