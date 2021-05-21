<?php


use App\controllers\LoginMechanism;

$app = new \Slim\App();

$app->post('/signup', function($request, $response){
    $parsedBody = $request->getParsedBody();
    $data = array(
        'name' => $parsedBody['name'],
        'username' => $parsedBody['username'],
        'mobileNum' => $parsedBody['mobileNum'],
        'password' => $parsedBody['password']
    );

    $mechanism = new LoginMechanism();
    $res = $mechanism->signup($data);

    return $response->withJson($res);
});

$app->post('/login', function ($request, $response){
    $parsedBody = $request->getParsedBody();
    $data = array(
        "username" => $parsedBody["username"],
        "mobileNum" => $parsedBody["mobileNum"],
        "password" => $parsedBody["password"]
    );

    $mechanism = new LoginMechanism();
    $res = $mechanism->login($data);
    return $response->withJson($res);
});

$app->run();
