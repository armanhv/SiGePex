<?php

include '../../business/clienteBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idCliente = $_POST['idCliente'];

$clienteBusiness = new clienteBusiness(); //comunucacion con Business
$cliente = $clienteBusiness->buscarCliente($idCliente);

echo '

    <table>
                    
                    <tr>
                        <td><label for="nombreCliente">Nombre:</label></td>
                        <td><input type="text" value="'.$cliente->nombreCliente.'" name="txtNombreCliente" id="txtNombreCliente"><br></td>
                    </tr>

                    <tr>
                        <td><label for="primerApellido">Primer Apellido:</label></td>
                        <td><input type="text" value="'.$cliente->primerApellido.'" name="txtPrimerApellido" id="txtPrimerApellido"><br></td>
                    </tr>

                   
                    <tr>
                        <td><label for="segundoApellido">Segundo Apellido:</label></td>
                        <td><input type="text" value="'.$cliente->segundoApellido.'" name="txtSegundoApellido" id="txtSegundoApellido"><br></td>
                    </tr>
                    <tr>
                        <td><label for="direccion">Direcci&oacute;n:</label></td>
                        <td><textarea rows="2" cols="22" maxlength="250s" value=""  id="txtDireccion">'.$cliente->direccion.'</textarea></td>
                    </tr>
                    <tr>
                        <td><input type="button" value="Insertar" onclick="insertarCliente()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Modificar" onclick="actualizarCliente()">&nbsp;&nbsp;</td>
                        <td><input type="button" value="Borrar" onclick="borrarCliente()">&nbsp;&nbsp;</td>
                    </tr>
                </table>
                ';
?>
