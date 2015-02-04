<?php

include_once '../../data/baseDatos.php';
include '../../domain/telefono.php';

class telefonoData {

    public $objConexionBaseDatos;

    public function telefonoData() {
        $this->objConexionBaseDatos = new baseDatos();
    }

    public function getIdTelefono() {
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select max(idTelefono) from tbtelefonoempleado;");
        $this->objConexionBaseDatos->cerrarConexion();
        if (mysqli_num_rows($result) != 0) {
            $id = mysqli_fetch_array($result);
            return ++$id[0];
        } else {
            return 1;
        }
    }

    public function insertarTelefono($objTelefono) {

        $query = "INSERT INTO tbtelefonoempleado VALUES (" . $this->getIdTelefono() . ", " . $objTelefono->identificacionEmpleadoTelefono . ", '" . $objTelefono->numeroTelefono . "');";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarTelefono($objTelefono) {

        $query = "UPDATE tbtelefonoempleado SET  numeroTelefono='" . $objTelefono->numeroTelefono .
                "' WHERE idTelefono=" . $objTelefono->idTelefono . ";";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarTelefono($idTelefono) {

        $query = "DELETE FROM tbtelefonoempleado WHERE idTelefono=" . $idTelefono . ";";

        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerTelefono() {
        $query = "select* from tbTelefono";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayTelefono = [];

        while ($row = mysqli_fetch_array($result)) {
            $telefonoActual = new telefono($row['idTelefono'], $row['identificacionEmpleadoTelefono'], $row['numeroTelefono']);
            array_push($arrayTelefono, $telefonoActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayTelefono;
    }

    public function buscarTelefono($idTelefono) {
        $query = "SELECT * FROM tbtelefonoempleado WHERE(idTelefono =" . $idTelefono . ")";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $telefono = new telefono($row['idTelefono'], $row['identificacionEmpleadoTelefono'], $row['numeroTelefono']);

        $this->objConexionBaseDatos->cerrarConexion();
        return $telefono;
    }

    public function buscarTelefonosEmpleado($idEmpleado) {
        $query = "SELECT * FROM tbtelefonoempleado WHERE identificacionEmpleadoTelefono =" . $idEmpleado . ";";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayTelefono = [];
        while ($row = mysqli_fetch_array($resulGeneral)) {
            $telefonoActual = new telefono($row['idTelefono'], $row['identificacionEmpleadoTelefono'], $row['numeroTelefono']);
            array_push($arrayTelefono, $telefonoActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayTelefono;        
        
    }

}
