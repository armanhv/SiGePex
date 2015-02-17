<?php

include_once '../../data/baseDatos.php';
include_once '../../domain/autorizaCliente.php';
include_once '../../utilidades/utilidadesGenerales.php';

class autorizaClienteData {

    public $objConexionBaseDatos;


    public function autorizaClienteData() {
         $this->objConexionBaseDatos = new baseDatos();}

    public function getIdAutorizaCliente() {
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select max(idAutorizacionCliente) from tbautorizacliente;");
        $this->objConexionBaseDatos->cerrarConexion();
        if (mysqli_num_rows($resultado) != 0) {
            $id = mysqli_fetch_array($resultado);
            return ++$id[0];
        } else {
            return 1;
        }
    }

    public function insertarAutorizaCliente($objAutorizaCliente) {

        $query = "INSERT INTO tbautorizacliente VALUES (" . $this->getIdAutorizaCliente() . ", " . $objAutorizaCliente->idCliente . ", '" . $objAutorizaCliente->nombreAutorizado . "');";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);                                                                                               

        $this->objConexionBaseDatos->cerrarConexion();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    
    public function actualizarAutorizaCliente($objAutorizaCliente) {
        $query = "update tbautorizacliente set idCliente='" . $objAutorizaCliente->idCliente . "', nombreAutorizado = '" . $objAutorizaCliente->nombreAutorizado .
                 "'  where idAutorizacionCliente=" . $objAutorizaCliente->idAutorizacionCliente . " ;";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarAutorizaCliente($idAutorizacionCliente) {

        $query = "DELETE FROM tbautorizacliente WHERE idAutorizacionCliente=" . $idAutorizacionCliente . ";";

        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerAutorizaCliente() {
        $query = "select * from tbautorizacliente";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayAutorizaCliente = [];

        while ($row = mysqli_fetch_array($resultado)) {
            $AutorizaClienteActual = new autorizaCliente($row['idAutorizacionCliente'], $row['idCliente'],
            $row['nombreAutorizado']);
            array_push($arrayAutorizaCliente, $AutorizaClienteActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayAutorizaCliente;
    }

    public function buscarAutorizaCliente($idAutorizacionCliente) {
        $query = "SELECT * FROM tbautorizacliente WHERE(idAutorizacionCliente =" . $idAutorizacionCliente. ")";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $autorizaCliente = new autorizaCliente($row['idAutorizacionCliente'], $row['idCliente'],
            $row['nombreAutorizado']);
        $this->objConexionBaseDatos->cerrarConexion();
        return $autorizaCliente;
    }

    public function buscarAutorizados($idCliente) {
        $query = "SELECT * FROM tbautorizacliente WHERE idCliente =" . $idCliente . ";";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayAutorizaCliente = [];
        while ($row = mysqli_fetch_array($resulGeneral)) {
            $AutorizaClienteActual = new autorizaCliente($row['idAutorizacionCliente'], $row['idCliente'],
            $row['nombreAutorizado']);
            array_push($arrayAutorizaCliente, $AutorizaClienteActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayAutorizaCliente;        
        
    }

}
