<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Database\Capsule\Manager as Capsule;

class PostController {
    public function index(Request $request, Response $response, $args) {
        // Set CORS headers
        $response = $response->withHeader('Access-Control-Allow-Origin', '*')
                             ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                             ->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        $posts = Capsule::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.username')
            ->get();
        
        $response->getBody()->write($posts->toJson());
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function delete(Request $request, Response $response, $args) {
        // Set CORS headers
        $response = $response->withHeader('Access-Control-Allow-Origin', '*')
                             ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                             ->withHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        $id = $args['id'];
        Capsule::table('posts')->where('id', $id)->delete();
        
        return $response->withStatus(204); // No Content
    }
}
