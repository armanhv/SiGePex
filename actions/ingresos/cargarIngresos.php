<?php

//include '../../business/ingresosBusiness.php';
include 'buscarIngresos.php';


//los valores almacenados que se enviarion por el cliente
$idIngresos = $_POST['idIngresos'];

$ingresosBusiness = new ingresosBusiness(); //comunucacion con Business
$ingresos = $ingresosBusiness->buscarIngresos($idIngresos);

echo '
		
	
    <table>
					<tr>
					<label for="empleados">Empleado:</label>
					<div id="empleados"></div><br><br>
					</tr>
                    <tr>
                    <label for="Cliente">Cliente:</label>
					<span id="clientes"></span><br><br>
					</tr>
					
					<tr>
					<label for="tipoPago">Elija un Tipo de Pago:</label>
					<span id="tipoPagos"></span><br>
					</tr>
                   
                    <tr>
                        <td><label for="numBoucher">numBoucher:</label></td>
                        <td><input type="text" value="'.$stringIngresos->numBoucher.'" name="txtNumBoucher" id="txtNumBoucher"><br></td>
                    </tr>

                    <tr>
                        <td><label for="Monto">Monto:</label></td>
                        <td><input type="text" value="'.$stringIngresos->monto.'" name="txtMonto" id="txtMonto"><br></td>
                    </tr>

                    
                    <tr>
                        <td><label for="fechaIngreso">Fecha de Ingreso:</label></td>
                        <td><input type="text" value="'.$stringIngresos->fechaIngreso.'" name="txtFechaIngreso" id="txtFechaIngreso"><br></td>
                    </tr>
                    
                    <tr>
                        <td><input type="button" value="Insertar" onclick="insertarIngresos()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Actualizar" onclick="actualizarIngresos()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Borrar" onclick="borrarIngresos()">&nbsp;&nbsp;</td>
                    </tr>
                </table>
                ';
?>
