<?php

include_once '../../data/baseDatos.php';
include '../../domain/salario.php';
include '../../domain/empleado.php';
include '../../utilidades/utilidadesGenerales.php';

class salarioData {

    private $conexion;
    private $utilidad;

    public function salarioData() {
        $this->conexion = new baseDatos();
        $this->utilidad = new utilidadesGenerales($this->conexion);
    }

    public function insertarSalario($salario) {

        $query = "insert into tbsalario values (" . $this->utilidad->generarIdAutoIncremental('idSalario', 'tbsalario') . ", " . $salario->idEmpleado . ", "
                . $salario->salarioBase . ", " . $salario->horasExtraSalario . ", " . $salario->bonificacionesSalario . ", "
                . $salario->diasExtraSalario . ");";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarSalario($salario) {

        $query = "update tbsalario set identificacionEmpleado=" . $salario->idEmpleado . ", salarioBase=" . $salario->salarioBase
                . ", horasExtraSalario=" . $salario->horasExtraSalario . ", bonificacionesSalario=" . $salario->bonificacionesSalario
                . ", diasExtraSalario=" . $salario->diasExtraSalario . " where idSalario=" . $salario->idSalario . ";";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarSalario($idSalario) {
        $query = "delete from tbsalario where idSalario=" . $idSalario . ";";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerSalarios() {
        $query = "select* from tbsalario";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arraySalarios = [];

        while ($row = mysqli_fetch_array($result)) {
            $salarioActual = new salario($row['idSalario'], $row['identificacionEmpleado'], $row['salarioBase'], $row['horasExtraSalario'], $row['bonificacionesSalario'], $row['diasExtraSalario']);
            array_push($arraySalarios, $salarioActual);
        }

        $this->conexion->cerrarConexion();

        return $arraySalarios;
    }

    public function buscarSalario($idSalario) {
        $query = "SELECT * FROM tbsalario WHERE(idSalario =" . $idSalario . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $salario = new salario($row['idSalario'], $row['identificacionEmpleado'], $row['salarioBase'], $row['horasExtraSalario'], $row['bonificacionesSalario'], $row['diasExtraSalario']);

        $this->conexion->cerrarConexion();
        return $salario;
    }

    public function buscarEmpleadoSalario($idEmpleado) {
        $query = "SELECT * FROM tbempleado WHERE(idEmpleado =" . $idEmpleado . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $empleado = new empleado($row['idEmpleado'], $row['cedulaEmpleado'], $row['nombreEmpleado'], $row['primerApellidoEmpleado'], $row['segundoApellidoEmpleado'], $row['fechaNacimiento'], $row['emailEmpleado'], $row['direccionEmpleado'], $row['loginEmpleado'], $row['passwordEmpleado'], $row['cantidadHorasLaborales'], $row['costoHoraExtra'], $row['tiempoAlmuerzo'], $row['idRolEmpleado']);
        $this->conexion->cerrarConexion();
        return $empleado;
    }

    public function obtenerEmpleadosSalario() {
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
