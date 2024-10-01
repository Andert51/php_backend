<?php
    namespace app\controllers;

    use app\services\employeeService;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    class employeeController{
        private $EmployeeService;

        public function __construct(employeeService $EmployeeService){
            $this->EmployeeService = $EmployeeService;
        }

        public function getAll() {
            $employees = $this->EmployeeService->getAll();
            return new Response(json_encode($employees), 200, ['Content-Type' => 'application/json']);
        }

        public function getById($id) {
            $employee = $this->EmployeeService->getById($id);
            if ($employee){
                return new Response(json_encode($employee), 200, ['Content-Type' => 'application/json']);
            } else {
                return new Response(json_encode(['error' => 'Empleado no encontrado']), 404);
            }
        }

         public function getByUser($usuario) {
            $employee = $this->EmployeeService->getByUser($usuario);
            if ($employee){
                return new Response(json_encode($employee), 200, ['Content-Type' => 'application/json']);
            } else {
                return new Response(json_encode(['error' => 'Usuario no encontrado']), 404);
            }
        }

         public function createEmployee(Request $request) {
            $data = json_decode($request->getContent(), true);
            $employee = $this->EmployeeService->createEmployee($data);
            if (!$employee['error']){
                return new Response(json_encode(['mensaje' => 'Empleado creado con exito']), 201);
            } else {
                return new Response(json_encode(['error' => $employee ['mensaje']]), 404);
            }
        }

          public function updateEmployee($id, Request $request) {
            $data = json_decode($request->getContent(), true);
            $this->EmployeeService->updateEmployee($id, $data);
            return new Response(json_encode(['mensaje' => 'Empleado actualizado']), 201);
           
        }

           public function deleteEmployee($id) {
            $this->EmployeeService->deleteEmployee($id);
            return new Response(json_encode(['mensaje' => 'Empleado borrado']), 201);
           
        }

    }