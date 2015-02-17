<?php

include '../../business/autorizaClienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idAutorizacionCliente = $_POST['idAutorizacionCliente'];

//comunucacion con Business
$autorizaClienteBusiness = new autorizaClienteBusiness();
$autorizaCliente = $autorizaClienteBusiness->buscarAutorizaCliente($idAutorizacionCliente);



echo '
    <table>
                    
        <tr>
            <label for="nombreAutorizado">Nombre :&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" value=""  id="txNombreAutorizado"><br><br>
            
            
        <input type="button" value="Insertar" onclick="insertarAutorizaCliente();obtenerAutorizados();">&nbsp;&nbsp;
        </tr>
        
        <tr>
						
            <td><label for="AutorizaCliente">Autorizados:</label></td>
            <td><input type="text" value="' . $autorizaCliente->nombreAutorizado . '" name="txNombreAutorizado" id="txNombreAutorizado" onclick="obtenerAutorizaCliente();"><br></td>
					
        </tr>
            <br>
            <td><input type="button" value="Insertar" onclick="insertarAutorizaCliente()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Actualizar" onclick="actualizarAutorizaCliente()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Borrar" onclick="eliminarAutorizaCliente()">&nbsp;&nbsp;</td>
                    
        </tr>
        
                
    </table>';
?>
