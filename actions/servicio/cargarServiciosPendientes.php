<?php

include '../../business/servicioBusiness.php';
include '../../business/tipoServicioBusiness.php';
include '../../business/ingresosBusiness.php';
include '../../business/empleadoBusiness.php';

//los valores almacenados que se enviarion por el cliente
$idEmpleado = $_POST['idEmpleado'];

//comunucacion con Business
$servicioBusiness = new servicioBusines();
$tipoServicioBusiness = new tipoServicioBusines();
$formaDePagoBusines = new ingresosBusiness();
$empleadoBusiness = new empleadoBusiness();


if ($idEmpleado == 0) {
    echo ''; //'No eligio ningun empleado a cargo.';
} else {
    //uso de instancias
    $listaServicios = $servicioBusiness->obtenerServiciosDeEmpleado($idEmpleado);

    $empleado = $empleadoBusiness->buscarEmpleado($idEmpleado); //obtengo el empleado
    $nombreEmpleado = $empleado->nombreEmpleado . " " . $empleado->primerApellidoEmpleado . " " . $empleado->segundoApellidoEmpleado;

    echo '    
    <p>Servicios de: ' . $nombreEmpleado . '</p>    
    <table border="2px">
        <thead>
            <tr>
                <th scope="col">Numero De Servicio</th>
                <th scope="col">Tipo De Servicio</th>
                <th scope="col">Descripción</th>
                <th scope="col">Fecha</th>
                <th scope="col">Forma de Pago</th>
                <th scope="col">Total</th>
                <th scope="col">Estado</th>
                <td></td>
            </tr>
        </thead>
        <tbody>';

    foreach ($listaServicios as $currentServicio) {
        $tipoServicio = $tipoServicioBusiness->buscarTipoServicio($currentServicio->idTipoServicio);
        $formaDePago = $formaDePagoBusines->buscarTipoPago($currentServicio->formaDePago);

        if ($currentServicio->estadoServicio == 0) {
            $estadoServicio = "Pendiente";
            $boton = '<input type="button" value="Procesar" onclick="procesarServicio(' . $currentServicio->idServicio . ');">';
        } else {
            $estadoServicio = "Realizado";
            $boton = '<input type="button" value="Procesar" disabled>';
        }

        echo '
            <tr>
                <td>' . $currentServicio->idServicio . '</td>
                <td>' . $tipoServicio->nombreTipoServicio . '</td>
                <td>' . $currentServicio->descripcionServicio . '</td>
                <td>' . $currentServicio->fechaServicio . '</td>
                <td>' . $formaDePago->nombreTipo . '</td>
                <td>₡ ' . $currentServicio->total . '</td>
                <td>' . $estadoServicio . '</td>
                <td>' . $boton . '</td>
            </tr>';
    }// fin foreach

    echo '
        </tbody>
    </table>';
}