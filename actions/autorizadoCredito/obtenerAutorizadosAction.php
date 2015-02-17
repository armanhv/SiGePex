<?php

include_once '../../business/autorizadoCreditoBusiness.php';
include_once '../../business/clienteBusiness.php';

$idCredito = $_POST['idCredito'];

if ($idCredito != 0) {
    //comunicacion con Business
    $autorizadoCreditoBusiness = new autorizadoCreditoBusiness();
    $listaAutorizadosCredito = $autorizaClienteBusiness->buscarAutorizados($idCredito);

    $clienteBusiness = new clienteBusiness();
    $resultado = $clienteBusiness->buscarCliente($idCliente);
 
   echo '<p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Agregar Autorizados:</p><br>';
  
   
          echo ' 
            <label for="nombreAutorizado">Nombre Autorizado:&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" value=""  id="txtNombreAutorizado"><br><br>

            <input type="button" value="Insertar" onclick="insertarAutorizadoCredito();obtenerAutorizadosClientes()">&nbsp;&nbsp;';
   echo ' <input type="button" value="Modificar " onclick="actualizarAutorizadoCredito();obtenerAutorizadosClientes();">&nbsp;&nbsp;
            <input type="button" value="Eliminar " onclick="eliminarAutorizadoCredito();obtenerAutorizadosClientes();">&nbsp;&nbsp;<br><br>';

    echo '<label>Autorizados</label>
          <table>
          
<br>
            <span id="resultado"></span>
            <br>';

    foreach ($listaAutorizadosCredito as $currentAutorizadoCredito) {
        echo '
            <tr>
                <td><input type="radio" id="idAutorizacionCliente" name="idAutorizacionCliente" value="' . $currentAutorizadoCredito->idAutorizadoCredito. '" checked>'
        . '<a>' . $currentAutorizadoCredito->nombreAutorizado . '</a></td>                
            </tr>';
    }// fin foreach

    echo '</table>
    ';
}