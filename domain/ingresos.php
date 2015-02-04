<?php

class ingresos {

    public $idIngresos;
    public $idEmpleado;
    public $idCliente;
    public $tipoPago;
    public $numBoucher;
    public $monto;
    public $fechaIngreso;
    

    public function ingresos($idIngresos, $idEmpleado, $idCliente,$tipoPago, $numBoucher, $monto, $fechaIngreso) {
		
        $this->idIngresos= $idIngresos;
        $this->idEmpleado = $idEmpleado;
        $this->idCliente = $idCliente;
        $this->tipoPago = $tipoPago;
        $this->numBoucher = $numBoucher;
        $this->monto = $monto;
        $this->fechaIngreso = $fechaIngreso;
        
  
    }

}
?>
