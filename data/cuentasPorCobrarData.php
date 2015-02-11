<?php

include_once '../../domain/cuentasPorCobrar.php';
include_once '../../data/baseDatos.php';
include_once '../../domain/empleado.php';
include_once '../../domain/cliente.php';
include_once '../../business/morosidadBusiness.php';

class cuentasPorCobrarData {

    public $objConexionBaseDatos;
    private $objMorosidadBusiness;

    //constructor
    public function cuentasPorCobrarData() {
        $this->objConexionBaseDatos = new baseDatos();
        $this->objMorosidadBusiness = new morosidadBusiness();
    }

    public function obtenerIdCuentaCobrar() {
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select max(idCuentasPorCobrar) from tbcuentasporcobrar;");
        $this->objConexionBaseDatos->cerrarConexion();
        if (mysqli_num_rows($resultado) != 0) {
            $id = mysqli_fetch_array($resultado);
            return ++$id[0];
        } else {
            return 1;
        }
    }

    //Metodo para insertar una Cuenta Por Cobrar
    public function insertarCuentaPorCobrar($cuentaPorCobrar) {

        $query = "insert into tbcuentasporcobrar values (" . $this->obtenerIdCuentaCobrar() . ",'"
                . $cuentaPorCobrar->idEmpleado . "','" . $cuentaPorCobrar->idCliente
                . "','" . $cuentaPorCobrar->fechaPago . "','" . $cuentaPorCobrar->monto . "')";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $this->objConexionBaseDatos->cerrarConexion();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para eliminara una Cuenta Por Cobrar
    public function borrarCuentaPorCobrar($idCuentasPorCobrar) {
        $query = "delete from tbcuentasporcobrar where idCuentasPorCobrar=" . $idCuentasPorCobrar . ";";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para Actualizar una Cuenta Por Cobrar
    public function actualizarCuentaPorCobrar($cuentaPorCobrar) {
        $query = "update tbcuentasporcobrar set idEmpleado='" . $cuentaPorCobrar->idEmpleado . "', idCliente = '"
                . $cuentaPorCobrar->idCliente . "', fechaPago = '" . $cuentaPorCobrar->fechaPago . "',"
                . " monto = '" . $cuentaPorCobrar->monto . "'  where idCuentasPorCobrar=" . $cuentaPorCobrar->idCuentasPorCobrar . " ;";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarCuentasPorCobrar($idCuentasPorCobrar) {
        $query = "select* from tbcuentasporcobrar where idCuentasPorCobrar=" . $idCuentasPorCobrar . ";";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $row = $resulGeneral->fetch_array();
        $cuentasPorCobrar = new cuentasPorCobrar($row['idCuentasPorCobrar'], $row['idEmpleado'], $row['idCliente'], $row['fechaPago'], $row['monto']);
        $this->objConexionBaseDatos->cerrarConexion();
        return $cuentasPorCobrar;
    }

    public function obtenerCuentasPorCobrar($idCliente) {
        $query = "select * from tbcuentasporcobrar where idCliente=" . $idCliente;
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayCuentaPorCobrar = [];


        while ($row = mysqli_fetch_array($resultado)) {
            $currentCuentaPorCobrar = new cuentasPorCobrar($row['idCuentasPorCobrar'], $row['idEmpleado'], $row['idCliente'], $row['fechaPago'], $row['monto']);
            array_push($arrayCuentaPorCobrar, $currentCuentaPorCobrar);
        }
        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayCuentaPorCobrar;
    }

    public function verificarCuentasPorCobrarFechaPago() {
        $fechaActual = date("Y/m/d");
        $query = "select * from tbcuentasporcobrar where fechaPago < '" . $fechaActual . "'";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        while ($row = mysqli_fetch_array($resultado)) {
            $currentCuentaPorCobrarMorosa = new morosidad(0, $row['idCliente'], $row['fechaPago'], $row['monto']);
            $this->objMorosidadBusiness->insertarMorosidad($currentCuentaPorCobrarMorosa);
            $this->borrarCuentaPorCobrar($row['idCuentasPorCobrar']);
        }
    }

//METODOS PARA CARGAR COMBO CON OTRO

    public function obtenerClientesMorosos() {
        $query = "select * from btcliente";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayCliente = [];

        while ($row = mysqli_fetch_array($result)) {
            $clienteActual = new cliente($row['idCliente'], $row['nombreCliente'], $row['primerApellido'], $row['segundoApellido'], $row['direccion']);
            array_push($arrayCliente, $clienteActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayCliente;
    }

    public function buscarClientesMorosos($idCliente) {
        $query = "SELECT * FROM btcliente WHERE(idCliente =" . $idCliente . ")";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $cliente = new cliente($row['idCliente'], $row['nombreCliente'], $row['primerApellido'], $row['segundoApellido'], $row['direccion']);

        $this->objConexionBaseDatos->cerrarConexion();
        return $cliente;
    }

    public function buscarEmpleadosCuentaCobrar($identificacionEmpleado) {
        $query = "select* from tbempleado where(idEmpleado =" . $identificacionEmpleado . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $empleado = new empleado($row['idEmpleado'], $row['cedulaEmpleado'], $row['nombreEmpleado'], $row['primerApellidoEmpleado'], $row['segundoApellidoEmpleado'], $row['fechaNacimiento'], $row['emailEmpleado'], $row['direccionEmpleado'], $row['loginEmpleado'], $row['passwordEmpleado'], $row['cantidadHorasLaborales'], $row['costoHoraExtra'], $row['tiempoAlmuerzo'], $row['idRolEmpleado']);

        $this->objConexionBaseDatos->cerrarConexion();
        return $empleado;
    }

    public function obtenerFechaPagoCuentaPorCobrar($idEmpleado, $idCliente) {
        $query = "SELECT * FROM tbcuentasporcobrar WHERE idEmpleado= " . $idEmpleado . " AND idCliente=" . $idCliente;
        $resultadoGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $row = $resultadoGeneral->fetch_array();

        $cuentaPorCobrar = new cuentasPorCobrar($row['idCuentasPorCobrar'], $row['idEmpleado'], $row['idCliente'], $row['fechaPago'], $row['monto']);

        $this->objConexionBaseDatos->cerrarConexion();

        return $cuentaPorCobrar;
    }

}
