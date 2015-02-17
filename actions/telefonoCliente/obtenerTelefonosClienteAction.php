<?php

include_once '../../business/telefonoClienteBusiness.php';

$idCliente = $_POST['idCliente'];

if ($idCliente != 0) {
    //comunicacion con Business
    $telefonoBusiness = new telefonoClienteBusiness();
   $listaTelefonosEmpleado = $telefonoBusiness->buscarTelefonosCliente($idCliente);


    echo '<p> Agregar Teléfonos:</p> 
            <label>Agregar Teléfono nuevo: </label>
            <input type="text" size="1" name="nume1" id="txtTelefonoNum1" maxlength="2" onkeyup="contar(this, txtTelefonoNum2)" />-
            <input type="text" size="1" name="nume2" id="txtTelefonoNum2" maxlength="2" onkeyup="contar(this, txtTelefonoNum3)" />-
            <input type="text" size="1" name="nume3" id="txtTelefonoNum3" maxlength="2" onkeyup="contar(this, txtTelefonoNum4)" />-
            <input type="text" size="1" name="nume4" id="txtTelefonoNum4" maxlength="2" onkeyup="contar(this, txtTelefonoNum1)" /><br><br>
            <input type="button" value="Insertar Tel&#233fono" onclick="insertarTelefonoCliente();obtenerTelefonosCliente()">&nbsp;&nbsp;';
    echo '<input type="button" value="Modificar Tel&#233fono" onclick="actualizarTelefonoCliente();obtenerTelefonosCliente();">&nbsp;&nbsp;
            <input type="button" value="Eliminar T&#233lefono" onclick="eliminarTelefonoCliente();obtenerTelefonosCliente();">&nbsp;&nbsp;<br><br>';

    echo '<label>N&#250meros de tel&#233fonos</label>
          <table>';

    foreach ($listaTelefonosEmpleado as $currentTelefono) {
        echo '
            <tr>
                <td><input type="radio" id="idTelefono" name="idTelefono" value="' . $currentTelefono->idTelefonoCliente . '" checked>'
        . '<a>' . $currentTelefono->numeroTelefono . '</a></td>                
            </tr>';
    }// fin foreach

    echo '</table>';
}