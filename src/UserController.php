<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as Capsule; // Add this line

class UserController {
    public function index(Request $request, Response $response, $args) {
        $users = Capsule::table('users')->get();
        $response->getBody()->write($users->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    }
}
