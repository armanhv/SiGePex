<?php

include_once '../../domain/banco.php';
include_once '../../data/baseDatos.php';

class bancoData {

    public $objConexionBaseDatos;

    //constructor
    public function bancoData() {
        $this->objConexionBaseDatos = new baseDatos();
    }

    public function getIdBanco() {
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select max(idBanco) from tbbanco;");
        $this->objConexionBaseDatos->cerrarConexion();
        if (mysqli_num_rows($result) != 0) {
            $id = mysqli_fetch_array($result);
            return ++$id[0];
        } else {
            return 1;
        }
    }

    //Metodo para insertar un rol
    public function insertBanco($banco) {
        $query = "insert into tbbanco values (" . $this->getIdBanco() . ",'" . $banco->nombreBanco . "')";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para eliminara un rol
    public function deleteBanco($idBanco) {
        $query = "delete from tbbanco where idBanco=" . $idBanco . ";";
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para Actualizar un rol
    public function updateBanco($banco) {
        $query = "update tbbanco set nombreBanco='" . $banco->nombreBanco
                . "' where idBanco =" . $banco->idBanco;

        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para obtener todos los roles
    public function getBancos() {
        $result = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select * from tbbanco");
        $this->objConexionBaseDatos->cerrarConexion();
        $arrayBancos = [];

        while ($row = mysqli_fetch_array($result)) {
            $currentBanco = new banco($row['idBanco'], $row['nombreBanco']);
            array_push($arrayBancos, $currentBanco);
        }
        return $arrayBancos;
    }

    public function buscarBanco($idBanco) {
        $query = "SELECT * FROM tbbanco WHERE(idBanco =" . $idBanco . ")";

        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $row = $resulGeneral->fetch_array();
        $banco = new banco($row['idBanco'], $row['nombreBanco']);

        $this->objConexionBaseDatos->cerrarConexion();

        return $banco;
    }

}
