<?php
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ .'/../');
$dotenv->load();

return [
    'host' => $_ENV['DB_HOST'], // Devuelven arreglos
    'data' => $_ENV['DB_DATABASE'],
    'username' => $_ENV['DB_USERNAME'],
    'password' => $_ENV['DB_PASSWORD'],
];

?>