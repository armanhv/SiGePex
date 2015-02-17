<?php

class difHoras {

    private $dif;

    public function resta($inicio, $fin) {

        $this->dif = date("H:i:s", (strtotime("00:00:00") + (strtotime($fin) - strtotime($inicio))));

        return $this->dif;
    }

    public function decimal($hora) {
        $desglose = split(":", $hora);
        $dec = $desglose [0] + $desglose [1] / 60;

        return $dec;
    }

    public function format($hora) {
        $desglose = split(":", $hora);
        $dec = $desglose [0] . ":" . $desglose [1];

        return $dec;
    }

    //pasar un array con las horas para ir sumandolas
    public function totalHoras() {

        $total = date("H:i:m", (strtotime("08:00") + strtotime("05:00")));

        return $total;
    }

}
