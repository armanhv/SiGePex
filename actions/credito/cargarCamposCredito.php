<?php

include '../../business/creditoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idBusiness = $_POST['idBusiness'];

$creditoBusiness = new creditoBusiness(); //comunucacion con Business
$credito = $creditoBusiness->buscarCredito($idCredito);



echo '
    <table>
                 holaaaa   
        <tr>
            <label for="montoLimite">Monto Límite :&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" value=""  id="txtMontoLimite"><br><br>
            
            <label for="fechaPagoLimite">Fecha Límite Pago :&nbsp;&nbsp;</label>
            <input type="text" value=""  id="txtFechaPagoLimite"><br><br>
            &nbsp;&nbsp;
            
        <input type="button" value="Insertar" onclick="insertarCredito();obtenerCreditosCliente();">&nbsp;&nbsp;
        </tr>
        
        <tr>
						
            <td><label for="Credito">Credito:</label></td>
            <td><input type="text" value="' . $credito->montoLimite . '" name="txtMontoLimite" id="txtMontoLimite" onclick="obtenerCreditos();"><br></td>
					
        </tr>
            <br>
            <td><input type="button" value="Insertar" onclick="insertarCredito()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Actualizar" onclick="actualizarCredito()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Borrar" onclick="eliminarCredito()">&nbsp;&nbsp;</td>
                    
        </tr>
        
                
    </table>';
?>
