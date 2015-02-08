<?php

include '../../business/tipoServicioBusiness.php';

//comunicacion con business
$idTipoServicio = $_POST['idTipoServicio'];

$tipoServicioBusines = new tipoServicioBusines();
$tipoServicio = $tipoServicioBusines->buscarTipoServicio($idTipoServicio);

echo '
     <table>
        <tr>
            <td><label for="tipoServicio">Tipo de Servicio:</label></td>
            <td><input type="text" id="txtTipoServicio" name="txtTipoServicio" value="' . $tipoServicio->nombreTipoServicio . '"></td>
        </tr>
        <tr>
            <td><label for="precio">Precio del Servicio:</label></td>
            <td><input type="text" id="txtPrecio" name="txtPrecio" value="' . $tipoServicio->precioTipoServicio . '" class="currency"></td>
        </tr>
        <tr>
            <td><label for="descripcionTipoServicio">Descripción del Servicio:</label></td>
            <td><textarea rows="4" cols="22" value="" id="txtDescripcionTipoServicio">' . $tipoServicio->descripcionTipoServicio . '</textarea></td>
        </tr>
        <tr>
            <td><input type="button" value="Insertar" onclick="insertarTipoServicio()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Modificar" onclick="actualizarTipoServicio()">&nbsp;&nbsp;</td>
            <td><input type="button" value="Eliminar" onclick="borrarTipoServicio()">&nbsp;&nbsp;</td>
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
