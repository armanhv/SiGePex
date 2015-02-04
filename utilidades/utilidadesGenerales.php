<?php

class utilidadesGenerales {

    private $conexion;

    public function utilidadesGenerales($conexion) {
        $this->conexion = $conexion;
    }

    public function generarIdAutoIncremental($atributo, $tabla) {
        
        $query = "SELECT ".$atributo." FROM ".$tabla." ORDER BY ".$atributo." DESC LIMIT 1;";

        $resultadoId = mysqli_query($this->conexion->abrirConexion(), $query);
        $fila = mysqli_fetch_array($resultadoId);

        if ($fila != null) {
            return ($fila[$atributo] + 1);
        } else {
            return 1;
        }
    }

}
