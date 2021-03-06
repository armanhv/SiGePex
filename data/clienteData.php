<?php

include_once '../../data/baseDatos.php';
include_once '../../domain/cliente.php';
include_once '../../utilidades/utilidadesGenerales.php';

class clienteData {

    private $conexion;
    private $utilidad;

    public function clienteData() {
        $this->conexion = new BaseDatos();
        $this->utilidad = new utilidadesGenerales($this->conexion);
    }

    public function insertarCliente($objCliente) {

        $query = "INSERT INTO btcliente VALUES (" . $this->utilidad->generarIdAutoIncremental('idCliente', 'btcliente') . ", '" . $objCliente->nombreCliente . "', '" . $objCliente->primerApellido . "','" . $objCliente->segundoApellido . "');";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarCliente($objCliente) {

        $query = "update btcliente set nombreCliente='" . $objCliente->nombreCliente . "', primerApellido='" . $objCliente->primerApellido .
                "', segundoApellido='" . $objCliente->segundoApellido . "' where idCliente=" . $objCliente->idCliente . ";";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarCliente($idCliente) {
        $query = "delete from btcliente where idCliente=" . $idCliente . ";";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerCliente() {
        $query = "select* from btcliente";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayCliente = [];

        while ($row = mysqli_fetch_array($result)) {
            $clienteActual = new cliente($row['idCliente'], $row['nombreCliente'], $row['primerApellido'], $row['segundoApellido']);
            array_push($arrayCliente, $clienteActual);
        }

        $this->conexion->cerrarConexion();

        return $arrayCliente;
    }

    public function buscarCliente($idCliente) {
        $query = "SELECT * FROM btcliente WHERE(idCliente =" . $idCliente . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $cliente = new cliente($row['idCliente'], $row['nombreCliente'], $row['primerApellido'], $row['segundoApellido']);

        $this->conexion->cerrarConexion();
        return $cliente;
    }

}

?>
