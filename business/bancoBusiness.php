<?php

include '../../data/bancoData.php';

class bancoBusiness {

    //variables de composicion
    private $bancoData;

    //metoso constructor
    public function bancoBusiness() {
        $this->bancoData = new bancoData();
    }

    // metodo que se utiliza para insertar un rol
    public function insertBanco($banco) {
        $result = $this->bancoData->insertBanco($banco);
        return $result;
    }

    //metodo que se utiliza pra actualizar un rol
    public function updateBanco($banco) {
        $result = $this->bancoData->updateBanco($banco);
        return $result;
    }

    //metodo que se utiliza para eliminar un rol
    public function deleteBanco($idBanco) {
        $result = $this->bancoData->deleteBanco($idBanco);
        return $result;
    }

    //metodo que se utiliza para obtener todos los roles
    public function getBancos() {
        $restul = $this->bancoData->getBancos();
        return $restul;
    }

    public function buscarBanco($idBanco) {
        $restul = $this->bancoData->buscarBanco($idBanco);
        return $restul;
    }

}
