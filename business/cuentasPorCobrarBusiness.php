<?php

include_once "../../data/cuentasPorCobrarData.php";

class cuentasPorCobrarBusiness {

    //variables de composicion
    private $cuentasPorCobrarData;

    //metoso constructor
    public function cuentasPorCobrarBusiness() {
        $this->cuentasPorCobrarData = new cuentasPorCobrarData();
    }

    // metodo que se utiliza para insertar una cuenta por cobrar
    public function insertarCuentaPorCobrar($cuentaPorCobrar) {
        $resultado = $this->cuentasPorCobrarData->insertarCuentaPorCobrar($cuentaPorCobrar);
        return $resultado;
    }

    //metodo que se utiliza para actualizar una cuenta por cobrar
    public function actualizarCuentaPorCobrar($cuentaPorCobrar) {
        $resultado = $this->cuentasPorCobrarData->actualizarCuentaPorCobrar($cuentaPorCobrar);
        return $resultado;
    }

    //metodo que se utiliza para eliminar una cuenta por cobrar
    public function borrarCuentaPorCobrar($idCuentasPorCobrar) {
        $resultado = $this->cuentasPorCobrarData->borrarCuentaPorCobrar($idCuentasPorCobrar);
        return $resultado;
    }

    public function buscarCuentasPorCobrar($idCuentasPorCobrar) {
        $resultado = $this->cuentasPorCobrarData->buscarCuentasPorCobrar($idCuentasPorCobrar);
        return $resultado;
    }

    //metodo que se utiliza para obtener todas las cuentas por cobrar
    public function obtenerCuentasPorCobrar($idCliente) {
        $resultado = $this->cuentasPorCobrarData->obtenerCuentasPorCobrar($idCliente);
        return $resultado;
    }

    public function verificarCuentasPorCobrarFechaPago() {
        $this->cuentasPorCobrarData->verificarCuentasPorCobrarFechaPago();
    }

    public function obtenerClientesMorosos() {
        $resultado = $this->cuentasPorCobrarData->obtenerClientesMorosos();
        return $resultado;
    }

    public function buscarClientesMorosos($idCliente) {
        $cliente = $this->cuentasPorCobrarData->buscarClientesMorosos($idCliente);
        return $cliente;
    }

    public function buscarEmpleadosCuentaCobrar($idCliente) {
        $cliente = $this->cuentasPorCobrarData->buscarEmpleadosCuentaCobrar($idCliente);
        return $cliente;
    }

    public function obtenerFechaPagoCuentaPorCobrar($idEmpleado, $idCliente) {
        $cliente = $this->cuentasPorCobrarData->obtenerFechaPagoCuentaPorCobrar($idEmpleado, $idCliente);
        return $cliente;
    }

}
