<?php

include_once '../../data/baseDatos.php';
include_once '../../domain/autorizadoCredito.php';
include_once '../../utilidades/utilidadesGenerales.php';

class autorizadoCreditoData {

    public $objConexionBaseDatos;


    public function autorizadoCreditoData() {
         $this->objConexionBaseDatos = new baseDatos();}

    public function getIdAutorizadoCredito() {
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select max(idAutorizadoCredito) from tbautorizadoCredito;");
        $this->objConexionBaseDatos->cerrarConexion();
        if (mysqli_num_rows($resultado) != 0) {
            $id = mysqli_fetch_array($resultado);
            return ++$id[0];
        } else {
            return 1;
        }
    }

    public function insertarAutorizadoCredito($objAutorizadoCredito) {

        $query = "INSERT INTO tbautorizadocredito VALUES (" . $this->getIdAutorizadoCredito() . ", " . $objAutorizadoCredito->idCredito . ", '" . $objAutorizadoCredito->nombreAutorizado . "');";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);                                                                                               

        $this->objConexionBaseDatos->cerrarConexion();

        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    
    public function actualizarAutorizadoCredito($objAutorizadoCredito) {
        $query = "update tbautorizadoCredito set idCredito='" . $objAutorizadoCredito->idCredito . "', nombreAutorizado = '" . $objAutorizadoCredito->nombreAutorizado .
                 "'  where idAutorizadoCredito=" . $objAutorizadoCredito->idAutorizadoCredito . " ;";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarAutorizadoCredito($idAutorizadoCredito) {

        $query = "DELETE FROM tbautorizadocredito WHERE idAutorizadoCredito=" . $idAutorizadoCredito . ";";

        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerAutorizadoCredito() {
        $query = "select * from tbautorizadocredito";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayAutorizadoCredito = [];

        while ($row = mysqli_fetch_array($resultado)) {
            $AutorizadoCreditoActual = new autorizadoCredito($row['idAutorizadoCredito'], $row['idCredito'],
            $row['nombreAutorizado']);
            array_push($arrayAutorizadoCredito, $AutorizadoCreditoActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayAutorizadoCredito;
    }

    public function buscarAutorizadoCredito($idAutorizadoCredito) {
        $query = "SELECT * FROM tbautorizadocredito WHERE(idAutorizadoCredito =" . $idAutorizadoCredito. ")";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $autorizadoCredito = new autorizaCliente($row['idAutorizadoCredito'], $row['idCredito'],
            $row['nombreAutorizado']);
        $this->objConexionBaseDatos->cerrarConexion();
        return $autorizadoCredito;
    }

    public function buscarAutorizadosClientes($idCredito) {
        $query = "SELECT * FROM tbautorizadoCredito WHERE idCredito =" . $idCredito . ";";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayAutorizadoCredito = [];
        while ($row = mysqli_fetch_array($resulGeneral)) {
            $AutorizadoCreditoActual = new autorizaCliente($row['idAutorizadoCredito'], $row['idCredito'],
            $row['nombreAutorizado']);
            array_push($arrayAutorizadoCredito, $AutorizadoCreditoActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $AutorizadoCreditoActual;        
        
    }

    public function buscarCliente($idAutorizadoCredito) {
        $query = "SELECT * FROM tbautorizadoCredito WHERE(idAutorizadoCredito =" . $idAutorizadoCredito . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();
//autorizaCliente
        $autorizadoCredito= new autorizadoCredito($row['idAutorizadoCredito'], $row['idCredito'], $row['nombreAutorizado']);

        $this->conexion->cerrarConexion();
        return $autorizadoCredito;
    }
}

?>

