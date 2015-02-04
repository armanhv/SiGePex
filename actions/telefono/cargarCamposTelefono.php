<?php

include '../../business/telefonoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idBusiness = $_POST['idBusiness'];

$telefonoBusiness = new telefonoBusiness(); //comunucacion con Business
$telefono = $telefonoBusiness->buscarTelefono($idTelefono);

echo '
    <table>
                    
                    <tr>
                        <td><input type="text" size="1" name="num1" id="txtTelefonoNum1" maxlength="2" onkeyup="contar(this, num2)" />-</td>
                        <td><input type="text" size="1" name="num2" id="txtTelefonoNum2" maxlength="2" onkeyup="contar(this, num3)" />-</td>
                        <td><input type="text" size="1" name="num3" id="txtTelefonoNum3" maxlength="2" onkeyup="contar(this, num4)" />-</td>
                        <td><input type="text" size="1" name="num4" id="txtTelefonoNum4" maxlength="2" onkeyup="contar(this, num1)" /></td>
                    </tr>
                    <tr>
						
						<td><label for="Numero Telefono">Numero Tel&#233fono:</label></td>
                        <td><input type="text" value="'.$telefono->numeroTelefono.'" name="txtNumeroTelefono" id="txtNumeroTelefono" onclick="obtenerTelefono()"><br></td>
					</tr>
                        <td><input type="button" value="Insertar" onclick="insertarCuenta()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Actualizar" onclick="actualizarCuenta()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Borrar" onclick="borrarCuenta()">&nbsp;&nbsp;</td>
                    </tr>
                
                </table>
                ';
?>
