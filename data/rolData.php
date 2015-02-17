<?php

include '../../domain/rol.php';
include_once '../../data/baseDatos.php';
include '../../utilidades/utilidadesGenerales.php';

class rolData {

    //Variables 
    private $conexion;
    private $utilidad;

    //constructor
    public function rolData() {
        $this->conexion = new baseDatos();
        $this->utilidad = new utilidadesGenerales($this->conexion);
    }

    //Metodo para insertar un rol
    public function insertRol($rol) {

        $query = "insert into tbrol values (" . $this->utilidad->generarIdAutoIncremental('idRol', 'tbrol') . ",'" . $rol->nombreRol . "')";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para eliminara un rol
    public function deleteRol($idRol) {
        $query = "delete from tbrol where idRol=" . $idRol . ";";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para Actualizar un rol
    public function updateRol($rol) {
        $query = "update tbrol set nombreRol='" . $rol->nombreRol
                . "' where idRol =" . $rol->idRol;

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para obtener todos los roles
    public function getRoles() {
        $result = mysqli_query($this->conexion->abrirConexion(), "select * from tbrol");
        $arrayRoles = [];

        while ($row = mysqli_fetch_array($result)) {
            $currentRol = new rol($row['idRol'], $row['nombreRol']);
            array_push($arrayRoles, $currentRol);
        }

        $this->conexion->cerrarConexion();

        return $arrayRoles;
    }

}
