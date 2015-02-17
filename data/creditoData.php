<?php

include_once '../../data/baseDatos.php';
include '../../domain/credito.php';

class creditoData {

    public $objConexionBaseDatos;

    public function creditoData() {
        $this->objConexionBaseDatos = new baseDatos();
    }

    public function getIdCredito() {
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select max(idCredito) from tbcreditos;");
        $this->objConexionBaseDatos->cerrarConexion();
        if (mysqli_num_rows($resultado) != 0) {
            $id = mysqli_fetch_array($resultado);
            return ++$id[0];
        } else {
            return 1;
        }
    }

    public function insertarCredito($objCredito) {

        $query = "INSERT INTO tbcreditos VALUES (" . $this->getIdCredito() . ", " . $objCredito->idCliente . ", '" . $objCredito->montoLimite . "','" . $objCredito->fechaPagoLimite . "');";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);                                                                                               

        $this->objConexionBaseDatos->cerrarConexion();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    
    public function actualizarCredito($objCredito) {
        $query = "update tbcreditos set idCliente='" . $objCredito->idCliente . "', montoLimite = '" . $objCredito->montoLimite .
                "', fechaPagoLimite= '" .$objCredito->fechaPagoLimite . "'  where idCredito=" . $objCredito->idCredito . " ;";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarCredito($idCredito) {

        $query = "DELETE FROM tbcreditos WHERE idCredito=" . $idCredito . ";";

        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerCredito() {
        $query = "select* from tbcredito";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayCredito = [];

        while ($row = mysqli_fetch_array($result)) {
            $creditoActual = new credito($row['idCredito'], $row['idCliente'],
            $row['montoLimite'], $row['fechaPagoLimite']);
            array_push($arrayCredito, $creditoActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayCredito;
    }

    public function buscarCredito($idCredito) {
        $query = "SELECT * FROM tbcreditos WHERE(idCredito =" . $idCredito. ")";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $credito = new credito($row['idCredito'], $row['idCliente'],
            $row['montoLimite'], $row['fechaPagoLimite']);
        $this->objConexionBaseDatos->cerrarConexion();
        return $credito;
    }

    public function buscarCreditosCliente($idCliente) {
        $query = "SELECT * FROM tbcreditos WHERE idCliente =" . $idCliente . ";";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayCredito = [];
        while ($row = mysqli_fetch_array($resulGeneral)) {
            $creditoActual = new credito($row['idCredito'], $row['idCliente'],
            $row['montoLimite'], $row['fechaPagoLimite']);
            array_push($arrayCredito, $creditoActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayCredito;        
        
    }

}
