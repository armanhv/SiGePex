<?php

include '../../business/autorizadoCreditoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idAutorizadoCreditoCliente = $_POST['idAutorizadoCredito'];

//comunucacion con Business
$autorizadoCreditoBusiness = new autorizadoCreditoBusiness();
$autorizadoCredito = $autorizadoCreditoBusiness->buscarAutorizadoCredito($idAutorizadoCredito);



echo '
    <table>
                    
        <tr>
            <label for="nombreAutorizado">Nombre :&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" value=""  id="txNombreAutorizado"><br><br>
            
            
        <input type="button" value="Insertar" onclick="insertarAutorizadoCredito();obtenerAutorizadosClientes();">&nbsp;&nbsp;
        </tr>
        
        <tr>
						
            <td><label for="AutorizadoCredito">Autorizados:</label></td>
            <td><input type="text" value="' . $autorizadoCredito->nombreAutorizado . '" name="txNombreAutorizado" id="txNombreAutorizado" onclick="obtenerAutorizadoCredito();"><br></td>
					
        </tr>
            <br>
            <td><input type="button" value="Insertar" onclick="insertarAutorizadoCredito()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Actualizar" onclick="actualizarAutorizadoCredito()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Borrar" onclick="eliminarAutorizadoCredito()">&nbsp;&nbsp;</td>
                    
        </tr>
        
                
    </table>';
?>
