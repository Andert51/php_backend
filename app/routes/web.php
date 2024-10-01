<?php

    use app\controllers\employeeController;
    use Symfony\Component\HttpFoundation\Request;

    $employeeController = new employeeController($employeeService);

    $router->get('/empleados', function(Request $request) use ($employeeController) {
        return $employeeController->getAll();
    });

    $router->get('/empleados/{id}', function($id) use ($employeeController) {
        return $employeeController->getById($id);
    });

    $router->post('/empleados', function(Request $request) use ($employeeController) {
        return $employeeController->createEmployee($request);
    });

    $router->put('/empleados/{id}', function($id, Request $request) use ($employeeController) {
        return $employeeController->updateEmployee($id, $request);
    });

    $router->delete('/empleados/{id}', function($id) use ($employeeController) {
        return $employeeController->deleteEmployee($id);
    });


?>