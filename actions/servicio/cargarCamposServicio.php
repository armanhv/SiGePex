<?php

include '../../business/servicioBusiness.php';
include '../../business/empleadoBusiness.php';
include '../../business/clienteBusiness.php';
include '../../business/tipoServicioBusiness.php';
include '../../business/ingresosBusiness.php';
include '../../business/cuentasPorCobrarBusiness.php';
include '../../business/servicioCuentasPorCobrarBusiness.php';
include '../../business/servicioIngresoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idServicio = $_POST['idServicio'];
$idTipoPagoServicio;

//comunucacion con Business
$servicioBusiness = new servicioBusines();
$empleadoBusiness = new EmpleadoBusiness();
$clienteBusiness = new clienteBusiness();
$tipoServicioBusines = new tipoServicioBusines();
$ingresosBusiness = new ingresosBusiness();
$cuentasPorCobrarBusiness = new cuentasPorCobrarBusiness();
$servicioCuentasPorCobrarBusiness = new servicioCuentasPorCobrarBusiness();
$servicioIngresosBusiness = new servicioIngresoBusiness();

//uso de instancias
$listaTipoPago = $ingresosBusiness->obtenerTipoPago();
$servicio = $servicioBusiness->buscarServicio($idServicio);
$listaEmpleados = $empleadoBusiness->obtenerEmpleados();
$listaCliente = $clienteBusiness->obtenerCliente();
$listaTipoServicios = $tipoServicioBusines->obtenerTipoServicios();

// Se Realizan las busquedas
$ingresoServicio = $servicioIngresosBusiness->buscarServicioIngresos($idServicio);
$cuentasPorCobrarServicio = $servicioCuentasPorCobrarBusiness->buscarServicioCuentasPorCobrar($idServicio);

if ($ingresoServicio->idIngreso > 0) {
    $ingreso = $ingresosBusiness->buscarIngresos($ingresoServicio->idIngreso);
} else if ($cuentasPorCobrarServicio->idCuentasPorCobrarServicio > 0) {
    $cuentaPorCobrar = $cuentasPorCobrarBusiness->buscarCuentasPorCobrar($cuentasPorCobrarServicio->idCuentasPorCobrarServicio);
}

//se pasa las fechas a otro formato
if ($servicio->fechaServicio == "") {
    $fechaServicio = "";
} else {
    $fechaServicio = split("-", $servicio->fechaServicio);
    $fechaServicio = $fechaServicio[2] . "/" . $fechaServicio[1] . "/" . $fechaServicio[0];
}

if (isset($cuentaPorCobrar)) {
    if ($cuentaPorCobrar->fechaPago == "") {
        $fechaPago = "";
    } else {
        $fechaPago = split("-", $cuentaPorCobrar->fechaPago);
        $fechaPago = $fechaPago[2] . "/" . $fechaPago[1] . "/" . $fechaPago[0];
    }
} else {
    $fechaPago = "";//para evitar errores
}

echo '
    <table>
        <tr>
            <td><label for="Cliente">Cliente:</label></td>
            <td>';

echo '<SELECT NAME="cbxCliente" id="cbxCliente" SIZE=1>';
echo '<option value="0">Elija un Cliente</option>';

foreach ($listaCliente as $currentCliente) {

    $nombre = $currentCliente->nombreCliente . " " . $currentCliente->primerApellido . " " . $currentCliente->segundoApellido;

    if ($servicio->idCliente == $currentCliente->idCliente) {
        echo '<option value="' . $currentCliente->idCliente . '" selected>' . $nombre . '</option>';
    } else {
        echo '<option value="' . $currentCliente->idCliente . '">' . $nombre . '</option>';
    }
}
echo '</select>';

echo '</td>
        </tr>
        <tr>
            <td><label for="empleados">Empleado:</label></td>
            <td>';

echo '<SELECT  name="cbxEmpleadoSalario" id="cbxEmpleadoSalario" size=1>';
echo '<option value="0">Elija un Empleado</option>';

foreach ($listaEmpleados as $currentEmpleado) {

    $idEmpleado = $currentEmpleado->idEmpleado;
    $nombreEmpleado = $currentEmpleado->nombreEmpleado . " " . $currentEmpleado->primerApellidoEmpleado . " " . $currentEmpleado->segundoApellidoEmpleado;

    if ($servicio->idEmpleado == $currentEmpleado->idEmpleado) {
        echo '<option value="' . $idEmpleado . '" selected>' . $nombreEmpleado . '</option>';
    } else {
        echo '<option value="' . $idEmpleado . '">' . $nombreEmpleado . '</option>';
    }
}
echo '</select>';

echo '</td>
        </tr>
        <tr>
            <td><label for="tipoServicio">Elija un Tipo de Servicio:</label></td>
            <td>';

echo '<SELECT name="cbxTipoServicios" onchange="mostrarTotal();" id="cbxTipoServicios" size=1>';
echo '<option value="0">Elija un Tipo de Servicio</option>';


foreach ($listaTipoServicios as $currentTipo) {

    $idTipoPago = $currentTipo->idTipoServicio;
    $nombreTipo = $currentTipo->nombreTipoServicio;

    if ($servicio->idTipoServicio == $currentTipo->idTipoServicio) {
        echo '<option value="' . $idTipoPago . '" selected>' . $nombreTipo . '</option>';
    } else {
        echo '<option value="' . $idTipoPago . '">' . $nombreTipo . '</option>';
    }
}
echo '</SELECT>';

echo '</td>
        </tr>
        <tr>
            <td><label for="fechaServicio">Fecha del Servicio:</label></td>
            <td><input type="text" value="' . $fechaServicio . '" name="txtFechaServicio" id="txtFechaServicio"></td>
        </tr>
        <tr>
            <td><label for="formaPago">Forma de Pago:</label></td>
            <td>';

echo '<SELECT onChange="cambiarDisplay()" name="cbxTipoPago" id="cbxTipoPago" size=1>';
echo '<option value="0">Elija un Tipo de Pago</option>';

foreach ($listaTipoPago as $currentTipoPago) {

    $idTipo = $currentTipoPago->idTipoPago;
    $nombreTipo = $currentTipoPago->nombreTipo;

    if ($servicio->formaDePago == $currentTipoPago->idTipoPago) {
        $idTipoPagoServicio = $servicio->formaDePago;
        echo '<option value="' . $idTipo . '" selected>' . $nombreTipo . '</option>';
    } else {
        echo '<option value="' . $idTipo . '">' . $nombreTipo . '</option>';
    }
}
echo '</SELECT>';

echo '</td>
        </tr>
        <tr id="trBoucher" ';

if ($idTipoPagoServicio == "2") {
    echo 'style="display:">';
} else {
    echo 'style="display:none">';
}

if (isset($ingreso)) {
    $numBoucher = $ingreso->numBoucher;
} else {
    $numBoucher = "";
}
echo '            
            <td><label for="numBoucher">Numero de Boucher:</label></td>
            <td><input type="text" value="' . $numBoucher . '" name="txtNumBoucher" id="txtNumBoucher"><br></td>
        </tr>';

echo '<tr id="trFechaPago" ';
if ($idTipoPagoServicio == "1") {
    echo 'style="display:">';
} else {
    echo 'style="display:none">';
}
echo '
            <td><label for="fechaPago">Fecha Pago:</label></td>
            <td><input type="text" value="' . $fechaPago . '" name="txtFechaPago" id="txtFechaPago"><br></td>
    </tr>';


echo '<tr>
            <td><label for="cargosExtra">Cargos Extra:</label></td>
            <td><input type="text" id="txtCargosExtra" name="txtCargosExtra" value="' . $servicio->cargosExtra . '"class="currency" onchange="mostrarTotal();"></td>
        </tr>
        <tr>
            <td><label for="descripcionServicio">Descripción del Servicio:</label></td>
            <td><textarea rows="4" cols="22" value="" id="txtDescripcionServicio">' . $servicio->descripcionServicio . '</textarea></td>
        </tr>
        <tr>
            <td><label for="montoTotal">Total a Pagar:</label></td>
            <td><span id="montoTotal">₡ ' . $servicio->total . '</span></td>
        </tr>
        <tr>
            <td><input type="button" value="Insertar" onclick="insertarServicio()"></td>
            <td><input type="button" value="Actualizar" onclick="actualizarServicio()"></td>
            <td><input type="button" value="Borrar" onclick="borrarServicio()"></td>
        </tr>
    </table>
    
     <!--Este script es para el txt de las fechas no se pueda pegar ni copiar-->
    <script type="text/JavaScript">
        $("#txtFechaServicio").datepicker();
        $("#txtFechaPago").datepicker();
        datePickerLatino();
    </script>
    
    <script>
        $(document).ready(function () {
            $(".currency").blur(function () {
                $(".currency").formatCurrency();
            });
        });
    </script>';

