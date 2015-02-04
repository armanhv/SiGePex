<?php

include '../../data/rolData.php';

class rolBusiness {

    //variables de composicion
    private $rolData;

    //metoso constructor
    public function rolBusiness() {
        $this->rolData = new rolData();
    }

    // metodo que se utiliza para insertar un rol
    public function insertRol($rol) {
        $result = $this->rolData->insertRol($rol);
        return $result;
    }

    //metodo que se utiliza pra actualizar un rol
    public function updateRol($rol) {
        $result = $this->rolData->updateRol($rol);
        return $result;
    }

    //metodo que se utiliza para eliminar un rol
    public function deleteRol($idRol) {
        $result = $this->rolData->deleteRol($idRol);
        return $result;
    }

    //metodo que se utiliza para obtener todos los roles
    public function getRoles() {
        $restul = $this->rolData->getRoles();
        return $restul;
    }

}
