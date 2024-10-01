<?php

namespace App\interfaces;

interface employeeInterface {
    public function getAll();
    public function getById($id);
    public function getByUser($usuario);
    public function createEmployee($data);
    public function updateEmployee($id, $data);
    public function deleteEmployee($id);
    public function searchByUserNombre ($usuario,  $nombre, $apaterno,  $amaterno);
}

?>