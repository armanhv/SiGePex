<?php

include_once '../../data/baseDatos.php';
include '../../domain/empleado.php';
include '../../domain/horario.php';
include '../../utilidades/utilidadesGenerales.php';

class horarioData {

    //Variables 
    private $conexion;
    private $utilidad;

    //constructor
    public function horarioData() {
        $this->conexion = new baseDatos();
        $this->utilidad = new utilidadesGenerales($this->conexion);
    }

    //Metodo para insertar un horario
    public function insertHorario($horario) {

        $query = "insert into tbhorario values(" . $this->utilidad->generarIdAutoIncremental('idHorario', 'tbhorario') . ", "
                . $horario->idEmpleadoHorario . ", '" . $horario->diaHorario . "', '"
                . $horario->horaInicio . "', '" . $horario->horaSalida . "', '" . $horario->totalHoras . "');";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para eliminara un horario
    public function deleteHorario($idHorario) {
        $query = "delete from tbhorario where idHorario=" . $idHorario . ";";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para actualizar un horario
    public function updateHorario($horario) {
        $query = "update tbhorario set idEmpleadoHorario=" . $horario->idEmpleadoHorario
                . ", dias='" . $horario->diaHorario . "', horaInicio='" . $horario->horaInicio
                . "', horaSalida='" . $horario->horaSalida . "', totalHoras='" . $horario->totalHoras . "' where idHorario =" . $horario->idHorario;

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para obtener todos los horarios
    public function getHorarios() {

        $query = "select* from tbhorario";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayHorarios = [];

        while ($row = mysqli_fetch_array($result)) {
            $horarioActual = new horario($row['idHorario'], $row['idEmpleadoHorario'], $row['diaHorario'], $row['horaInicio'], $row['horaSalida']);

            array_push($arrayHorarios, $horarioActual);
        }

        $this->conexion->cerrarConexion();

        return $arrayHorarios;
    }

    //metodo par abuscar un solo horario por id
    public function buscarHorario($idHorario) {
        $query = "SELECT * FROM tbhorario WHERE(idHorario =" . $idHorario . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $salario = new horario($row['idHorario'], $row['idEmpleadoHorario'], $row['diaHorario'], $row['horaInicio'], $row['horaSalida'], $row['totalHoras']);

        $this->conexion->cerrarConexion();

        return $salario;
    }

    //metodo para traer los empleados
    public function buscarEmpleadoHorario($idEmpleado) {
        $query = "SELECT * FROM tbempleado WHERE(idEmpleado =" . $idEmpleado . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $empleado = new empleado($row['idEmpleado'], $row['cedulaEmpleado'], $row['nombreEmpleado'], $row['primerApellidoEmpleado'], $row['segundoApellidoEmpleado'], $row['fechaNacimiento'], $row['emailEmpleado'], $row['direccionEmpleado'], $row['loginEmpleado'], $row['passwordEmpleado'], $row['cantidadHorasLaborales'], $row['costoHoraExtra'], $row['tiempoAlmuerzo'], $row['idRolEmpleado']);

        $this->conexion->cerrarConexion();
        return $empleado;
    }

    //Metodo para obtener todos los horarios
    public function buscarHorarioDeEmpleado($idEmpleado) {
        $query = "SELECT * FROM tbhorario WHERE (idEmpleadoHorario =" . $idEmpleado . ")";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayHorarios = [];

        while ($row = mysqli_fetch_array($result)) {
            $horarioActual = new horario($row['idHorario'], $row['idEmpleadoHorario'], $row['dias'], $row['horaInicio'], $row['horaSalida'], $row['totalHoras']);

            array_push($arrayHorarios, $horarioActual);
        }

        $this->conexion->cerrarConexion();

        return $arrayHorarios;
    }

}
