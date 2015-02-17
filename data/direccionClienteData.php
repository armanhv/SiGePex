<?php

include_once '../../data/baseDatos.php';
include_once '../../domain/direccionCliente.php';
include_once '../../utilidades/utilidadesGenerales.php';

class direccionClienteData {

    public $objConexionBaseDatos;


    public function direccionClienteData() {
         $this->objConexionBaseDatos = new baseDatos();}

    public function getIdDireccionCliente() {
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select max(idDireccion) from tbdirecioncliente;");
        $this->objConexionBaseDatos->cerrarConexion();
        if (mysqli_num_rows($resultado) != 0) {
            $id = mysqli_fetch_array($resultado);
            return ++$id[0];
        } else {
            return 1;
        }
    }

    public function insertarDireccionCliente($objDireccionCliente) {

        $query = "INSERT INTO tbdirecioncliente VALUES (" . $this->getIdDireccionCliente() . ", " . $objDireccionCliente->idCliente . ", '" . $objDireccionCliente->direccion . "');";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);                                                                                               

        $this->objConexionBaseDatos->cerrarConexion();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    
    public function actualizarDireccionCliente($objDireccionCliente) {
        $query = "update tbdirecioncliente set idCliente='" . $objDireccionCliente->idCliente . "', direccion = '" . $objDireccionCliente->direccion .
                 "'  where idDireccion=" . $objDireccionCliente->idDireccion . " ;";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarDireccionCliente($idDireccion) {

        $query = "DELETE FROM tbdirecioncliente WHERE idDireccion=" . $idDireccion . ";";

        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerDireccionCliente() {
        $query = "select * from tbdirecioncliente";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayDireccionCliente = [];

        while ($row = mysqli_fetch_array($resultado)) {
            $AutorizaDireccionActual = new autorizaCliente($row['idDireccion'], $row['idCliente'],
            $row['direccion']);
            array_push($arrayDireccionCliente, $AutorizaDireccionActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayDireccionCliente;
    }

    public function buscarDireccionCliente($idDireccion) {
        $query = "SELECT * FROM tbdirecioncliente WHERE(idDireccion =" . $idDireccion. ")";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $direccionCliente = new direccionCliente($row['idDireccion'], $row['idCliente'],
            $row['direccion']);
        $this->objConexionBaseDatos->cerrarConexion();
        return $direccionCliente;
    }

    public function buscarDirecciones($idCliente) {
        $query = "SELECT * FROM tbdirecioncliente WHERE idCliente =" . $idCliente . ";";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayDireccionCliente = [];
        while ($row = mysqli_fetch_array($resulGeneral)) {
            $AutorizaDireccionActual = new direccionCliente($row['idDireccion'], $row['idCliente'],
            $row['direccion']);
            array_push($arrayDireccionCliente, $AutorizaDireccionActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayDireccionCliente;        
        
    }

}
