<?php

class baseDatos {

    //variables
    private $servidor;
    private $usuario;
    private $password;
    private $db;
    private $conexion;

    //constructor
    public function baseDatos() {
        $this->servidor = "127.0.0.1";
        $this->usuario = "root";
        $this->password = "";
        $this->db = "dbsigepex";
    }

    //connection method
    public function abrirConexion() {
        $this->conexion = mysqli_connect($this->servidor, $this->usuario, $this->password, $this->db);
        return $this->conexion;
    }

    // close the connection
    public function cerrarConexion() {
        mysqli_close($this->conexion);
    }
}
