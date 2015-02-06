<?php


include_once '../../data/baseDatos.php';
include '../../domain/telefonoCliente';

class telefonoClienteData {

    public $objConexionBaseDatos;

    public function telefonoClienteData() {
        $this->objConexionBaseDatos = new baseDatos();
    }

    public function getIdTelefono() {
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select max(idTelefonoCliente) from tbtelefonocliente;");
        $this->objConexionBaseDatos->cerrarConexion();
        if (mysqli_num_rows($result) != 0) {
            $id = mysqli_fetch_array($result);
            return ++$id[0];
        } else {
            return 1;
        }
    }

    public function insertarTelefono($objTelefono) {

        $query = "INSERT INTO tbtelefonocliente VALUES (" . $this->getIdTelefono() . ", " .
                $objTelefono->idCliente . ", '" . $objTelefono->numeroTelefono . "');";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarTelefono($objTelefono) {

        $query = "UPDATE tbtelefonocliente SET  numeroTelefono='" . $objTelefono->numeroTelefono .
                "' WHERE idTelefonoCliente=" . $objTelefono->idTelefonoCliente . ";";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarTelefono($idTelefonoCliente) {

        $query = "DELETE FROM tbtelefonocliente WHERE idTelefonoCliente=" . $idTelefonoCliente . ";";

        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $this->objConexionBaseDatos->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerTelefono() {
        $query = "select* from tbtelefonocliente";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayTelefono = [];

        while ($row = mysqli_fetch_array($result)) {
            $telefonoActual = new telefono($row['idTelefonoCliente'], $row['idCliente'], $row['numeroTelefono']);
            array_push($arrayTelefono, $telefonoActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayTelefono;
    }

    public function buscarTelefono($idTelefonoCliente) {
        $query = "SELECT * FROM tbtelefonocliente WHERE(idTelefonoCliente =" . $idTelefonoCliente . ")";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $telefono = new telefono($row['idTelefonoCliente'], $row['idCliente'], $row['numeroTelefono']);

        $this->objConexionBaseDatos->cerrarConexion();
        return $telefono;
    }

    public function buscarTelefonosCliente($idEmpleado) {
        $query = "SELECT * FROM tbtelefonocliente WHERE idCliente =" . $idEmpleado . ";";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $arrayTelefono = [];
        while ($row = mysqli_fetch_array($resulGeneral)) {
            $telefonoActual = new telefono($row['idTelefonoCliente'], $row['idCliente'], $row['numeroTelefono']);
            array_push($arrayTelefono, $telefonoActual);
        }

        $this->objConexionBaseDatos->cerrarConexion();

        return $arrayTelefono;        
        
    }

}

