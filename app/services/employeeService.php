<?php

namespace App\services;

use App\repositories\employeeRepo;

class employeeService {
    private $EmployeeRepo;

    public function __construct(employeeRepo $EmployeeRepo){
        $this->EmployeeRepo = $EmployeeRepo;

    }

    public function getAll(){
        return $this->EmployeeRepo->getAll();
    }

    public function getById($id){
        return $this->EmployeeRepo->getById($id);
    }

    public function getByUser($usuario){
        return $this->EmployeeRepo->getByUser($usuario);
    }

    public function createEmployee($data){
        $exist = $this->EmployeeRepo->searchByUserNombre($data['usuario'], $data['nombre'], $data['apaterno'], $data['amaterno']);
        if($exist){
            return ['error' => true, 'mensaje' => 'Ya existe un empleado con el nombre o usuario'];
        }

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $this->EmployeeRepo->createEmployee($data);
        return ['succes' => true, 'mensaje' => 'Empleado creado con exito'];
    }

    public function updateEmployee($id, $data){
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        $this->EmployeeRepo->updateEmployee($id, $data);
    }

    public function  deleteEmployee($id){
        $this->EmployeeRepo->deleteEmployee($id);
    }
}

?>