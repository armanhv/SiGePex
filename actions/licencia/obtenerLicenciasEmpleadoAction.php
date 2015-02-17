<?php

include_once '../../business/licenciaBusiness.php';

$idEmpleado = $_POST['idEmpleado'];

if ($idEmpleado != 0) {
    //comunicacion con Business
    $licenciaBusiness = new licenciaBusiness();
    $listaLicenciasEmpleado = $licenciaBusiness->buscarLicenciasEmpleado($idEmpleado);
    echo '<p> Agregar Licencias:</p>
            <label for="tipoLicencia">Tipo de Licencia:&nbsp;&nbsp;</label>
            <select id="cbxTipoLicencia" name="cbxTipoLicencia">
                <option value="A1">A1</option>
                <option value="A2">A2</option>
                <option value="A3">A3</option>
                <option value="B1" selected="selected">B1</option>
                <option value="B2">B2</option>
                <option value="B3">B3</option>
                <option value="B4">B4</option>
                <option value="C1">C1</option>
                <option value="C2">C2</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="E1">E1</option>
                <option value="E2">E2</option>
            </select>
            <br><br> 
            <label for="fechaEmision">Fecha de Emisi&#243n:&nbsp;&nbsp;</label>
            <input type="text" value=""  id="txtFechaEmision">
            &nbsp;&nbsp; 
            <label for="fechaExpiracion">Fecha de Expiraci&#243n:&nbsp;&nbsp;</label>
            <input type="text" value=""  id="txtFechaExpiracion">
            <br><br> 
            <input type="button" value="Insertar Licencia" onclick="insertarLicencia();">&nbsp;&nbsp; 
            <input type="button" value="Modificar Licencia" onclick="actualizarLicencia()">&nbsp;&nbsp; 
            <input type="button" value="Eliminar Licencia" onclick="eliminarLicencia()">&nbsp;&nbsp;  
            
        <table>
            <tr>                
                <td>Licencias del Empleado: &nbsp;&nbsp;&nbsp;</td>
            </tr><tr>
            <td>Tipo de Licencia</td>
    <td>Fecha de Emisi&#243n</td> 
    <td>Fecha de Expiraci&#243n</td></tr>';

    foreach ($listaLicenciasEmpleado as $currentLicencia) {
        echo '
            <tr>
                <td><input type="radio" onclick="cargarInformacionLicencia()" id="idLicencia" name="idLicencia" value="' . $currentLicencia->idLicencia . '" checked>
                  ' . $currentLicencia->tipoLicencia . '  </td><td>'
        . $currentLicencia->fechaEmisionLicencia . '</td><td>  '
        . $currentLicencia->fechaExpiracionLicencia . '</td>
            </tr>';
    }// fin foreach

    echo '</table>';

    echo '
        <script type="text/JavaScript">
            $("#txtFechaEmision").datepicker();
            $("#txtFechaExpiracion").datepicker();
            datePickerLatino();
        </script>';
}



