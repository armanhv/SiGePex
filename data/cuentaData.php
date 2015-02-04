<?php

include 'baseDatos.php';
include '../../domain/cuenta.php';
include '../../domain/empleado.php';
include '../../utilidades/utilidadesGenerales.php';

class cuentaData {

    private $conexion;
    private $utilidad;

    public function cuentaData() {
        $this->conexion = new baseDatos();
        $this->utilidad = new utilidadesGenerales($this->conexion);
    }

    public function insertarCuenta($objCuenta) {

        $query = "INSERT INTO tbcuenta VALUES (" . $this->utilidad->generarIdAutoIncremental('idCuenta', 'tbcuenta') . ", "
                . $objCuenta->idEmpleado . ", '" . $objCuenta->numeroCuenta . "', " . $objCuenta->idBanco . ",'"
                . $objCuenta->tipoCuenta . "', '" . $objCuenta->numeroSimpe . "');";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarCuenta($objCuenta) {

        $query = "UPDATE tbcuenta SET idEmpleado='" . $objCuenta->idEmpleado
                . "', numeroCuenta='" . $objCuenta->numeroCuenta . "', idBanco='"
                . $objCuenta->idBanco . "',tipoCuenta='" . $objCuenta->tipoCuenta
                . "', numeroSimpe='" . $objCuenta->numeroSimpe . "' WHERE idCuenta="
                . $objCuenta->idCuenta . ";";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarCuenta($idCuenta) {

        $query = "DELETE FROM tbcuenta WHERE idCuenta=" . $idCuenta . ";";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerCuentas() {
        $query = "select* from tbcuenta";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayCuenta = [];

        while ($row = mysqli_fetch_array($result)) {
            $cuentaActual = new cuenta($row['idCuenta'], $row['numeroCuenta'], $row['idBanco'], $row['tipoCuenta'], $row['numeroSimpe'], $row['idEmpleado']);
            array_push($arrayCuenta, $cuentaActual);
        }

        $this->conexion->cerrarConexion();

        return $arrayCuenta;
    }

    public function buscarCuenta($idCuenta) {
        $query = "SELECT * FROM tbcuenta WHERE(idCuenta =" . $idCuenta . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $cuenta = new cuenta($row['idCuenta'], $row['numeroCuenta'], $row['idBanco'], $row['tipoCuenta'], $row['numeroSimpe'], $row['idEmpleado']);

        $this->conexion->cerrarConexion();
        return $cuenta;
    }

    public function buscarEmpleadoCuenta($idEmpleado) {
        $query = "SELECT * FROM tbempleado WHERE(idEmpleado =" . $idEmpleado . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $empleado = new empleado($row['idEmpleado'], $row['cedulaEmpleado'], $row['nombreEmpleado'], $row['primerApellidoEmpleado'], $row['segundoApellidoEmpleado'], $row['fechaNacimiento'], $row['emailEmpleado'], $row['direccionEmpleado'], $row['loginEmpleado'], $row['passwordEmpleado'], $row['cantidadHorasLaborales'], $row['costoHoraExtra'], $row['tiempoAlmuerzo'], $row['idRolEmpleado']);
        $this->conexion->cerrarConexion();
        return $empleado;
    }

}
