<?php

include '../../business/cuentaBusiness.php';
include '../../business/empleadoBusiness.php';
include '../../business/bancoBusiness.php';

$tipoCuenta = array("Ahorro", "Cuenta Corriente", "Extranjera");

//los valores almacenados que se enviarion por el cliente
$idCuenta = $_POST['idCuenta'];

$cuentaBusiness = new cuentaBusiness(); //comunucacion con Business
$empleadoBusiness = new empleadoBusiness();
$bancoBusiness = new bancoBusiness();

$cuenta = $cuentaBusiness->buscarCuenta($idCuenta);
$listaEmpleados = $empleadoBusiness->obtenerEmpleados();
$listaBancos = $bancoBusiness->getBancos();


echo ' <table>
            <tr>
                <td> <label for="empleados">Empleado:</label></td>
                <td><SELECT name="cbxEmpleadoCuenta" id="cbxEmpleadoCuenta" size=1>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;

    if ($cuenta->idEmpleado == $currentEmpleado->idEmpleado) {
        echo '<option value="' . $idEmpleado . '" selected>' . $nombreEmpleado . '</option>';
    } else {
        echo '<option value="' . $idEmpleado . '">' . $nombreEmpleado . '</option>';
    }
}


echo '
            </td>       
        </tr>       
        <tr>
            <td><label for="numeroCuenta">Numero Cuenta:</label></td>
            <td><input type="text" value="' . $cuenta->numeroCuenta . '" name="txtNumeroCuenta" id="txtNumeroCuenta"><br></td>
        </tr>
        <tr>
            <td><label for="nombreBanco">Nombre Banco:</label></td>
            <td><select name="cbxBancos" id="cbxBancos" size=1>';

foreach ($listaBancos as $currentBanco) {

    $idBanco = $currentBanco->idBanco;
    $nombreBanco = $currentBanco->nombreBanco;

    if ($cuenta->idBanco == $currentBanco->idBanco) {
        echo '<option value="' . $idBanco . '" selected>' . $nombreBanco . '</option>';
    } else {
        echo '<option value="' . $idBanco . '">' . $nombreBanco . '</option>';
    }
}

echo '</td>
        </tr>
        <tr>
            <td><label for="tipoCuenta">Tipo Cuenta:</label></td>
            <td><select id="cbxTipoCuenta" name="cbxTipoCuenta">';

if ($cuenta->tipoCuenta == $tipoCuenta[0]) {
    echo '<option value="Ahorro" selected>Ahorro</option>
          <option value="Cuenta Corriente">Cuenta Corriente</option>
          <option value="Extranjera">Extranjera</option>';
} elseif ($cuenta->tipoCuenta == $tipoCuenta[1]) {
    echo '<option value="Ahorro">Ahorro</option>
          <option value="Cuenta Corriente" selected>Cuenta Corriente</option>
          <option value="Extranjera">Extranjera</option>';
} else {
    echo '<option value="Ahorro">Ahorro</option>
          <option value="Cuenta Corriente">Cuenta Corriente</option>
          <option value="Extranjera" selected>Extranjera</option>';
}

echo '
            </td>
        </tr>
        <tr>
            <td><label for="numeroSimpe">Numero Simpe:</label></td>
            <td><input type="text" value="' . $cuenta->numeroSimpe . '" name="txtnumeroSimpe" id="txtnumeroSimpe"><br></td>
        </tr>

        <tr>
            <td><input type="button" value="Insertar" onclick="insertarCuenta()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Actualizar" onclick="actualizarCuenta()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Borrar" onclick="borrarCuenta()">&nbsp;&nbsp;</td>
        </tr>
    </table>
                ';
