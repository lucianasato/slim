<?php

use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\User;

$app->get('/api/v1/users', function(Request $request, Response $response, array $args) {
    return $response->withJson(User::all());
});

$app->post('/api/v1/users', function(Request $request, Response $response, array $args) {
    $user = User::create($request->getParsedBody());
    return $response->withJson($user);
});

$app->get('/api/v1/users/{id}', function(Request $request, Response $response, array $args) {
    return $response->withJson(User::findOrFail($args['id']));
});

$app->put('/api/v1/users/{id}', function(Request $request, Response $response, array $args) {
    $user = User::findOrFail($args['id']);
    $user->update($request->getParsedBody());
    return $response->withJson($user);
});

$app->delete('/api/v1/users/{id}', function(Request $request, Response $response, array $args) {
    $user = User::findOrFail($args['id']);
    $user->delete();
    return $response->withJson($user);
});