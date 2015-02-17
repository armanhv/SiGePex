<?php

include '../../business/direccionClienteBusiness.php';
include_once '../../business/clienteBusiness.php';

$idCliente = $_POST['idCliente'];

if ($idCliente != 0) {
    //comunicacion con Business
    $direccionClienteBusiness = new direccionClienteBusiness();
    $listaDireccionCliente = $direccionClienteBusiness->buscarDirecciones($idCliente);

    $clienteBusiness = new clienteBusiness();
    $resultado = $clienteBusiness->buscarCliente($idCliente);
 
   echo '<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agregar Direcciones Clientes:</p><br>';
  
          echo ' 
            <label for="direccion">Direccion:&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <textarea rows="4" cols="22" maxlength="250s" value=""  id="txtDireccion"></textarea><br><br>

            <input type="button" value="Insertar" onclick="insertarDireccionCliente();obtenerDirecciones()">&nbsp;&nbsp;';
   echo ' <input type="button" value="Modificar " onclick="actualizarDireccionCliente();obtenerDirecciones();">&nbsp;&nbsp;
            <input type="button" value="Eliminar " onclick="eliminarDireccionCliente();obtenerDirecciones();">&nbsp;&nbsp;<br><br>';

    echo '<label>Direcciones</label>
          <table>
          
<br>
            <span id="resultado"></span>
            <br>';

    foreach ($listaDireccionCliente as $currentDireccionCliente) {
        echo '
            <tr>
                <td><input type="radio" id="idDireccion" name="idDireccion" value="' . $currentDireccionCliente->idDireccion. '" checked>'
        . '<a>' . $currentDireccionCliente->direccion . '</a></td>                
            </tr>';
    }// fin foreach

    echo '</table>
    ';
}