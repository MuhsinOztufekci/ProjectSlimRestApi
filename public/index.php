<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Database.php';
require __DIR__ . '/../src/PostController.php';
require __DIR__ . '/../src/UserController.php';

new Database();

$app = AppFactory::create();

$app->get('/api/posts', [PostController::class, 'index']);
$app->delete('/api/posts/{id}', [PostController::class, 'delete']);
$app->get('/api/users', [UserController::class, 'index']);

$app->options('/api/posts/{id}', function (Request $request, Response $response) {
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');
});

$app->run();
