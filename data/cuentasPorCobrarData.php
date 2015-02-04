<?php

include_once '../../domain/cuentasPorCobrar.php';
include_once '../../data/baseDatos.php';

class cuentasPorCobrarData {

    public $objConexionBaseDatos;

    //constructor
    public function cuentasPorCobrarData() {
        $this->objConexionBaseDatos = new baseDatos();
    }
    
    public function obtenerIdCuentaCobrar() {
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select max(idCuentasPorCobrar) from tbcuentasporcobrar;");
        $this->objConexionBaseDatos->cerrarConexion();
        if (mysqli_num_rows($resultado) != 0) {
            $id = mysqli_fetch_array($resultado);
            return ++$id[0];
        } else {
            return 1;
        }
    }

    //Metodo para insertar una Cuenta Por Cobrar
    public function insertarCuentaPorCobrar($cuentaPorCobrar) {
        
        $query = "insert into tbcuentasporcobrar values (" . $this->obtenerIdCuentaCobrar(). ",'" 
                .$cuentaPorCobrar->idEmpleado. "','".$cuentaPorCobrar->idCliente 
                . "','".$cuentaPorCobrar->fechaPago ."','". $cuentaPorCobrar->monto. "')";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
             
        $this->objConexionBaseDatos->cerrarConexion();
        if ($resultado) {
            return true;
        } else {
            return false;
                        
        }
        
    }
    

    //Metodo para eliminara una Cuenta Por Cobrar
    public function borrarCuentaPorCobrar($idCuentasPorCobrar) {
        $query = "delete from tbcuentasporcobrar where idCuentasPorCobrar=" . $idCuentasPorCobrar . ";";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    //Metodo para Actualizar una Cuenta Por Cobrar
    public function actualizarCuentaPorCobrar($cuentaPorCobrar) {
        $query = "update tbcuentasporcobrar set idEmpleado='" . $cuentaPorCobrar->idEmpleado. "', idCliente = '"
                 .$cuentaPorCobrar->idCliente. "', fechaPago = '". $cuentaPorCobrar->fechaPago."',"
                . " monto = '" . $cuentaPorCobrar->monto.  "'  where idCuentasPorCobrar=" . $cuentaPorCobrar->idCuentasPorCobrar . " ;";
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $this->objConexionBaseDatos->cerrarConexion();
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarCuentasPorCobrar($idCuentasPorCobrar) {
        $query = "select* from tbcuentasporcobrar where idCuentasPorCobrar=" . $idCuentasPorCobrar . ";";
        $resulGeneral = mysqli_query($this->objConexionBaseDatos->abrirConexion(), $query);
        $row = $resulGeneral->fetch_array();
        $cuentasPorCobrar = new cuentasPorCobrar($row['idCuentasPorCobrar'], $row['idEmpleado'], $row['idCliente'], $row['fechaPago'], $row['monto']);
        $this->objConexionBaseDatos->cerrarConexion();
        return $cuentasPorCobrar;
    }
    
    //Metodo para obtener todos los roles
    public function obtenerCuentasPorCobrar() {
        $resultado = mysqli_query($this->objConexionBaseDatos->abrirConexion(), "select * from tbcuentasporcobrar");
        $this->objConexionBaseDatos->cerrarConexion();
        $arrayCuentaPorCobrar = [];

        while ($row = mysqli_fetch_array($resultado)) {
            $currentCuentaPorCobrar= new cuentasPorCobrar($row['idCuentasPorCobrar'], $row['idEmpleado'], $row['idCliente'], $row['fechaPago'], $row['monto']);
            array_push($arrayCuentaPorCobrar, $currentCuentaPorCobrar);
        }
        return $arrayCuentaPorCobrar;
    }

}


