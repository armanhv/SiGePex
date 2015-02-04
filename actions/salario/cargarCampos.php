<?php

include '../../business/salarioBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idSalario = $_POST['idSalario'];

$salarioBusines = new salarioBusiness(); //comunucacion con Business
$salario = $salarioBusines->buscarSalario($idSalario);
$listaEmpleados = $salarioBusines->obtenerEmpleadosSalario(); //lista de empleados

echo '<table>
        <tr>
            <td><label for="Empleado">Eliga un Empleado:</label></td>      
            <td><SELECT name="cbxEmpleadoSalario" id="cbxEmpleadoSalario" size=1>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;

    if ($salario->idEmpleado == $currentEmpleado->idEmpleado) {
        echo '<option value="' . $idEmpleado . '" selected>' . $nombreEmpleado . '</option>';
    } else {
        echo '<option value="' . $idEmpleado . '">' . $nombreEmpleado . '</option>';
    }
}

echo '
            </td>
        </tr>
        <tr>
            <td><label for="salarioBase">Salario Base:</label></td>
            <td><input type="text" name="txtSalarioBase" id="txtSalarioBase" value="' . $salario->salarioBase . '" class="currency"></td>
        </tr>
        <tr>
            <td><label for="HorasExtra">Hora Extra:</label></td>
            <td><input type="text" name="txtHorasExtras" id="txtHorasExtras" value="' . $salario->horasExtraSalario . '" class="currency"></td>
        </tr>
        <tr>
            <td><label for="bonificaciones">Bonificaciones:</label></td>
            <td> <input type="text" name="txtBonificaciones" id="txtBonificaciones" value="' . $salario->bonificacionesSalario . '" class="currency"></td>
        </tr>
        <tr>
            <td><label for="diasExtra">Dias Extra:</label></td>
            <td> <input type="text" name="txtDiasExtra" id="txtDiasExtra" value="' . $salario->diasExtraSalario . '" class="currency"></td>
        </tr>
        <tr>
            <td><input type="button" value="Insertar" onclick="insertarSalario()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Actualizar" onclick="actualizarSalario()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Borrar" onclick="borrarSalario()">&nbsp;&nbsp;</td>
        </tr>
    </table>
    
<script>
    $(document).ready(function () {
        $(".currency").blur(function () {
            $(".currency").formatCurrency();
        });
    });
</script>
';
