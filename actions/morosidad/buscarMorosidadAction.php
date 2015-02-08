<?php

include '../../business/morosidadBusiness.php';

$morosidadBusiness = new morosidadBusiness();

$morosidad = $morosidadBusiness->buscarMorosidad($_POST['id']);

header("Content-type: text/x-json");
echo json_encode($morosidad);
exit();

?>