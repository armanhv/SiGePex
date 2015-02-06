<?php

include_once '../../data/baseDatos.php';
include_once '../../domain/ingresos.php';
include_once '../../domain/empleado.php';
include_once '../../domain/cliente.php';
include_once '../../domain/tipoPago.php';

include '../../utilidades/utilidadesGenerales.php';

class ingresosData {

    private $conexion;
    private $utilidad;

    public function ingresosData() {
        $this->conexion = new BaseDatos();
        $this->utilidad= new utilidadesGenerales($this->conexion);
    }

    public function insertarIngreso($objIngresos) {

        $query = "INSERT INTO tbingresos VALUES (" .$this->utilidad->generarIdAutoIncremental('idIngresos','tbingresos').", "  
                . $objIngresos->idEmpleado . ", " . $objIngresos->idCliente .",".$objIngresos->tipoPago. ", '" . $objIngresos->numBoucher . "',"
                . $objIngresos->monto . ", '".$objIngresos->fechaIngreso.  "');";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarIngresos($objIngresos) {

        $query = "update tbingresos set idEmpleado=" . $objIngresos->idEmpleado . ", idCliente=" . $objIngresos->idCliente.
        ", tipoPago=" . $objIngresos->tipoPago 
                . ", numBoucher='" . $objIngresos->numBoucher . "', monto=" . $objIngresos->monto
                . ", fechaIngreso='" . $objIngresos->fechaIngreso . "' where idIngresos=" . $objIngresos->idIngresos . ";";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarIngresos($idIngresos) {
        $query = "delete from tbingresos where idIngresos=" . $idIngresos . ";";

        $result = mysqli_query($this->conexion->abrirConexion(), $query);

        $this->conexion->cerrarConexion();

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerIngresos() {
        $query = "select* from tbingresos";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayIngresos = [];

        while ($row = mysqli_fetch_array($result)) {
            $ingresosActual = new ingresos($row['idIngresos'], $row['idEmpleado'], $row['idCliente'], $row['tipoPago'],
             $row['numBoucher'], $row['monto'], $row['fechaIngreso']);
            array_push($arrayIngresos, $ingresosActual);
        }

        $this->conexion->cerrarConexion();

        return $arrayIngresos;
    }

    public function buscarIngresos($idIngresos) {
        $query = "SELECT * FROM tbingresos WHERE(idIngresos =" . $idIngresos . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $ingresos = new ingresos($row['idIngresos'], $row['idEmpleado'], $row['idCliente'], $row['tipoPago'], $row['numBoucher'],
         $row['monto'], $row['fechaIngreso']);

        $this->conexion->cerrarConexion();
        return $ingresos;
    }

    public function buscarEmpleado($identificacionEmpleado) {  
        $query =  "select* from tbempleado where(idEmpleado =" . $identificacionEmpleado . ")";     
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);
        
        $row = $resulGeneral->fetch_array();
        
        $empleado = new empleado($row['idEmpleado'],$row['cedulaEmpleado'],
                    $row['nombreEmpleado'],$row['primerApellidoEmpleado'], $row['segundoApellidoEmpleado'], 
                    $row['fechaNacimiento'], $row['emailEmpleado'], $row['direccionEmpleado'],
                    $row['loginEmpleado'], $row['passwordEmpleado'], $row['cantidadHorasLaborales'],
                    $row['costoHoraExtra'],$row['tiempoAlmuerzo'], $row['idRolEmpleado']);
        
        $this->objConexionBaseDatos->cerrarConexion();
        return $empleado;
    }
    public function buscarCliente($idCliente) {
        $query = "SELECT * FROM btcliente WHERE(idCliente =" . $idCliente . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $cliente = new cliente($row['idCliente'], $row['nombreCliente'], $row['primerApellido'], $row['segundoApellido'], $row['direccion']);

        $this->conexion->cerrarConexion();
        return $cliente;
    }
    public function buscarTipoPago($idTipoPago) {
        $query = "SELECT * FROM tbtipopago WHERE(idTipoPago =" . $idTipoPago . ")";
        $resulGeneral = mysqli_query($this->conexion->abrirConexion(), $query);

        $row = $resulGeneral->fetch_array();

        $tipoPago = new tipoPago($row['idTipoPago'], $row['nombreTipo']);

        $this->conexion->cerrarConexion();
        return $tipoPago;
    }
    public function obtenerTipoPago() {
        $query = "select* from tbtipopago";
        $result = mysqli_query($this->conexion->abrirConexion(), $query);
        $arrayTipoPago = [];

        while ($row = mysqli_fetch_array($result)) {
            $tipoPagoActual = new tipoPago($row['idTipoPago'], $row['nombreTipo']);
            array_push($arrayTipoPago, $tipoPagoActual);
        }

        $this->conexion->cerrarConexion();

        return $arrayTipoPago;
    }

}

?>
