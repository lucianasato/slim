<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Firebase\JWT\JWT;
use App\Models\User;

$app->post('/auth/token', function(Request $request, Response $response, array $args) {
    $data = $request->getParsedBody();
    $email = empty($data['email']) ? null : $data['email'];
    $password = empty($data['password']) ? null : $data['password'];

    $user = User::where('email', $email)->first();

    if (!is_null($user) && password_verify($password, $user->password)) {
        $key = $this->get('settings')['secretKey'];

        return $response->withJson([
            'token' => JWT::encode($user, $key)
        ]);
    }

    $response->withJson(['status' => 'error'], 401);
});
