<?php

include_once '../../business/telefonoBusiness.php';
include_once '../../business/empleadoBusiness.php';

$idEmpleado = $_POST['idEmpleado'];

if ($idEmpleado != 0) {
    //comunicacion con Business
    $telefonoBusiness = new telefonoBusiness();
    $listaTelefonosEmpleado = $telefonoBusiness->buscarTelefonosEmpleado($idEmpleado);

    $empleadoBusiness = new empleadoBusiness();
    $resultado = $empleadoBusiness->buscarEmpleado($idEmpleado);

    echo '<p> Agregar Teléfonos:</p> 
            <label>Agregar Teléfono nuevo: </label>
            <input type="text" size="1" name="num1" id="txtTelefonoNum1" maxlength="2" onkeyup="contar(this, num2)" />-
            <input type="text" size="1" name="num2" id="txtTelefonoNum2" maxlength="2" onkeyup="contar(this, num3)" />-
            <input type="text" size="1" name="num3" id="txtTelefonoNum3" maxlength="2" onkeyup="contar(this, num4)" />-
            <input type="text" size="1" name="num4" id="txtTelefonoNum4" maxlength="2" onkeyup="contar(this, num1)" /><br><br>
            <input type="button" value="Insertar Tel&#233fono" onclick="insertarTelefono();obtenerTelefonosEmpleado()">&nbsp;&nbsp;';
    echo '<input type="button" value="Modificar Tel&#233fono" onclick="actualizarTelefono();obtenerTelefonosEmpleado();">&nbsp;&nbsp;
            <input type="button" value="Eliminar T&#233lefono" onclick="eliminarTelefono();obtenerTelefonosEmpleado();">&nbsp;&nbsp;<br><br>';

    echo '<label>N&#250meros de tel&#233fonos</label>
          <table>';

    foreach ($listaTelefonosEmpleado as $currentTelefono) {
        echo '
            <tr>
                <td><input type="radio" id="idTelefono" name="idTelefono" value="' . $currentTelefono->idTelefono . '" checked>'
        . '<a>' . $currentTelefono->numeroTelefono . '</a></td>                
            </tr>';
    }// fin foreach

    echo '</table>';
}