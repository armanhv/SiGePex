<?php

include_once '../../data/baseDatos.php';
include_once '../../domain/licencia.php';

class licenciaData {

    private $objConexionBaseDatos;

    public function licenciaData() {
        $this->objConexionBaseDatos = new baseDatos();
    }

    public function getIdLicencia() {
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select max(idLicencia) from tblicencia;");
        $this->objConexionBaseDatos->cerrarConexion();
        if (mysqli_num_rows($result) != 0) {
            $id = mysqli_fetch_array($result);
            return ++$id[0];
        } else {
            return 1;
        }
    }

    public function insertarLicencia($objLicenciaEmpleado) {

        $query = "insert into tblicencia values (" . $this->getIdLicencia() . ", " . $objLicenciaEmpleado->idEmpleado . ",  '" .
                $objLicenciaEmpleado->tipoLicencia . "', '" . $objLicenciaEmpleado->fechaEmisionLicencia . "', '" .
                $objLicenciaEmpleado->fechaExpiracionLicencia . "');";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarLicencia($objLicenciaEmleado) {
        $query = "update tblicencia set tipoLicencia='" . $objLicenciaEmleado->tipoLicencia . "', fechaEmisionLicencia = '" . $objLicenciaEmleado->fechaEmisionLicencia .
                "', fechaExpiracionLicencia= '" . $objLicenciaEmleado->fechaExpiracionLicencia . "'  where idLicencia=" . $objLicenciaEmleado->idLicencia . " ;";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarLicencia($idLicencia) {
        $query = "delete from tblicencia where idLicencia='" . $idLicencia . "' ;";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarLicencia($idLicencia) {
        $query = "select * from tblicencia where idLicencia=" . $idLicencia . ";";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $row = $resulGeneral->fetch_array();
        $licenciaEmpleado = new licencia($row['idLicencia'], $row['idEmpleado'], $row['tipoLicencia'], $row['fechaEmisionLicencia'], $row['fechaExpiracionLicencia']);
        $this->objConexionBaseDatos->cerrarConexion();
        return $licenciaEmpleado;
    }

    public function buscarLicenciasEmpleado($identificacionEmpleado) {
        $query = "select * from tblicencia where idEmpleado=" . $identificacionEmpleado . " ;";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayLicencias = [];
        while ($row = mysqli_fetch_array($resulGeneral)) {
            $licenciaEmpleado = new licencia($row['idLicencia'], $row['idEmpleado'], $row['tipoLicencia'], $row['fechaEmisionLicencia'], $row['fechaExpiracionLicencia']);
            array_push($arrayLicencias, $licenciaEmpleado);
        }
        $this->objConexionBaseDatos->cerrarConexion();
        return $arrayLicencias;
    }

    public function obtenerLicencias() {
        $query = "select identificacionEmpleado from tblicencia;";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayLicencias = [];
        while ($row = mysqli_fetch_array($result)) {

            $licenciaEmpleado = new licencia($row['idLicencia'], $row['idEmpleado'], $row['tipoLicencia'], $row['fechaEmisionLicencia'], $row['fechaExpiracionLicencia']);
            array_push($arrayLicencias, buscarLicenciasEmpleado($licenciaEmpleado));
        }
        $this->objConexionBaseDatos->cerrarConexion();
        return $arrayLicencias;
    }

}
