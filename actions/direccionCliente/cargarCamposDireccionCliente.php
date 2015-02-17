<?php

include '../../business/direccionClienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idDireccion = $_POST['idDireccion'];

//comunucacion con Business
$direccionClienteBusiness= new direccionClienteBusiness();
$direccionCliente = $direccionClienteBusiness->buscarDireccionCliente($idDireccion);


echo '
    <table>
                    
        <tr>
            <label for="direccion">Direccion :&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" value=""  id="txtDireccion"><br><br>     
            
        <input type="button" value="Insertar" onclick="insertarDireccionCliente();obtenerDirecciones();">&nbsp;&nbsp;
        </tr>
        
        <tr>
						
            <td><label for="DireccionCliente">Direcciones:</label></td>
            <td><input type="text" value="' . $direccionCliente->direccion . '" name="txNombreAutorizado" id="txDireccion" onclick="obtenerDireccionCliente();"><br></td>
					
        </tr>
            <br>
            <td><input type="button" value="Insertar" onclick="insertarDireccionCliente()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Actualizar" onclick="actualizarDireccionCliente()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Borrar" onclick="eliminarDireccionCliente()">&nbsp;&nbsp;</td>
                    
        </tr>
        
                
    </table>';
?>
