<?php

namespace App\repositories;

use App\interfaces\employeeInterface;
use PDO;

class employeeRepo implements employeeInterface {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function getAll() {
        $select = $this->db->query("SELECT * FROM empleados");
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $selectId = $this->db->prepare("SELECT * FROM empleados WHERE id = ?");
        $selectId->execute([$id]);
        return $selectId->fetch(PDO::FETCH_ASSOC);
    }

    public function getByUser($usuario){
        $selectUser = $this->db->prepare("SELECT * FROM empleados WHERE usuario = ?");
        $selectUser->execute([$usuario]);
        return $selectUser->fetch(PDO::FETCH_ASSOC);
    }

    public function createEmployee($data){
        $insert = $this->db->prepare("INSERT INTO empleados (nombre, apaterno, amaterno, direccion, telefono, ciudad, estado, usuario, password, rol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->execute([$data['nombre'], $data['apaterno'], $data['amaterno'], $data['direccion'], $data['telefono'], $data['ciudad'], $data['estado'], $data['usuario'], $data['password'], $data['rol']]);
    }

    public function updateEmployee($id, $data){
        $update = $this->db->prepare("UPDATE empleados SET nombre = ?, apaterno = ?, amaterno = ?, direccion = ?, telefono = ?, ciudad = ?, estado = ?, usuario = ?, password = ?, rol = ? WHERE  id = ?");
        $update->execute([$data['nombre'], $data['apaterno'], $data['amaterno'], $data['direccion'], $data['telefono'], $data['ciudad'], $data['estado'], $data['usuario'], $data['password'], $data['rol'], $id]);
    }

    public function deleteEmployee($id){
        $delete = $this->db->prepare("DELETE  FROM empleados WHERE id = ?");
        $delete->execute([$id]);
    }

    public function searchByUserNombre($usuario, $nombre, $apaterno, $amaterno){
        $select = $this->db->prepare("SELECT * FROM empleados WHERE usuario = ? OR (nombre = ? AND apaterno = ? AND amaterno = ?)");
        $select->execute([$usuario, $nombre, $apaterno, $amaterno]);
        return  $select->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>