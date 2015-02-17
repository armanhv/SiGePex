<?php

include_once '../../business/creditoBusiness.php';
include_once '../../business/clienteBusiness.php';

$idCliente = $_POST['idCliente'];

if ($idCliente != 0) {
    //comunicacion con Business
    $creditoBusiness = new creditoBusiness();
    $listaCreditosCliente = $creditoBusiness->buscarCreditosCliente($idCliente);

    $clienteBusiness = new clienteBusiness();
    $resultado = $clienteBusiness->buscarCliente($idCliente);

    $nombreCliente = $resultado->nombreCliente . " " . $resultado->primerApellido . " " . $resultado->segundoApellido;

    echo '<script>
            $("#txtFechaPagoLimite").datepicker();
            datePickerLatino();
        </script>
        
        <script>
            $(document).ready(function () {
                $(".currency").blur(function () {
                    $(".currency").formatCurrency();
                });
            });
        </script>';

    echo '<p>Agregar Créditos:</p><br>';

    echo '<table>
            <tr>
                <td><label for="montoLimite">Monto Límite:<label></td>
                <td><input type="text" value=""  id="txtMontoLimite" class="currency"></td>
            </tr>
            <tr>
                <td><label for="fechaPagoLimite">Fecha Límite Pago</label></td>
                <td><input type="text" value=""  id="txtFechaPagoLimite"></td>
            </tr>
            <tr>
                <td><input type="button" value="Insertar" onclick="insertarCredito();obtenerCreditosCliente()"></td>
                <td><input type="button" value="Modificar " onclick="actualizarCredito();obtenerCreditosCliente();"></td>
                <td><input type="button" value="Eliminar " onclick="eliminarCredito();obtenerCreditosCliente();"></td>
            </tr>
        </table>';

    if ($listaCreditosCliente != NULL) {

        echo '<br><br><br>
        <label>Créditos</label>
        <table>
            <tr>
                <td></td>
                <td>Cliente</td>
                <td>Monto Límite</td>
                <td>Fecha de Cancelación</td>
            </tr>';

        foreach ($listaCreditosCliente as $currentCredito) {
            echo '
            <tr>
                <td><input type="radio" id="idCredito" name="idCredito" value="' . $currentCredito->idCredito . '" checked></td>
                <td>' . $nombreCliente . '</td>
                <td>' . $currentCredito->montoLimite . '</td>
                <td>' . $currentCredito->fechaPagoLimite . '</td>
            </tr>';
        }

        echo '</table>';
    }
}