<?php

include '../../business/autorizaClienteBusiness.php';
include_once '../../business/clienteBusiness.php';

$idCliente = $_POST['idCliente'];

if ($idCliente != 0) {
    //comunicacion con Business
    $autorizaClienteBusiness = new autorizaClienteBusiness();
    $listaAutorizaCliente = $autorizaClienteBusiness->buscarAutorizados($idCliente);

    $clienteBusiness = new clienteBusiness();
    $resultado = $clienteBusiness->buscarCliente($idCliente);
 
   echo '<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agregar Autorizados:</p><br>';
  
   
          echo ' 
            <label for="nombreAutorizado">Nombre Autorizado:&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" value=""  id="txtNombreAutorizado"><br><br>

            <input type="button" value="Insertar" onclick="insertarAutorizaCliente();obtenerAutorizados()">&nbsp;&nbsp;';
   echo ' <input type="button" value="Modificar " onclick="actualizarAutorizaCliente();obtenerAutorizados();">&nbsp;&nbsp;
            <input type="button" value="Eliminar " onclick="eliminarAutorizaCliente();obtenerAutorizados();">&nbsp;&nbsp;<br><br>';

    echo '<label>Autorizados</label>
          <table>
          
<br>
            <span id="resultado"></span>
            <br>';

    foreach ($listaAutorizaCliente as $currentAutorizaCliente) {
        echo '
            <tr>
                <td><input type="radio" id="idAutorizacionCliente" name="idAutorizacionCliente" value="' . $currentAutorizaCliente->idAutorizacionCliente. '" checked>'
        . '<a>' . $currentAutorizaCliente->nombreAutorizado . '</a></td>                
            </tr>';
    }// fin foreach

    echo '</table>
    ';
}