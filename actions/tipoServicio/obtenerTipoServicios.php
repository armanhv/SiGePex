<?php

include '../../business/tipoServicioBusiness.php';

//comunicacion con business
$tipoServicioBusines = new tipoServicioBusines();
$listaTipoServicios = $tipoServicioBusines->obtenerTipoServicios();

echo '<SELECT onChange="cargarTipoServicios();mostrarTotal()" name="cbxTipoServicios" id="cbxTipoServicios" size=1>';
echo '<option value="0">Eliga un Tipo de Servicio</option>';

foreach ($listaTipoServicios as $currentTipoServicio) {

    $idTipoServicio = $currentTipoServicio->idTipoServicio;
    $nombre = $currentTipoServicio->nombreTipoServicio;

    echo '<option value=' . $idTipoServicio . '>' . $nombre . '</option>';
}
