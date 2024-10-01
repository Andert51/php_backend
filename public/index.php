<?php

    require __DIR__ . '/../vendor/autoload.php';

    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $router = new \Bramus\Router\Router();

    require __DIR__ . '/../app/routes/web.php';

    $request = Request::createFromGlobals();
    $response = new Response();

    $router->run();
    $response->send();

?>