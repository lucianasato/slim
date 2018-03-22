<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\User;

$app->get('/api/v1/users', function(Request $request, Response $response, array $args) {
    return $response->withJson(User::all());
});