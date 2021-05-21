<?php
// Create and configure Slim app

use App\controllers\TestController;

$app = new \Slim\App();

// Define app routes
$app->post('/add', function ($request, $response, $args) {
    $parsedBody = $request->getParsedBody();
    $test = new TestController();
    $val = $test->addNum($parsedBody['num1'], $parsedBody['num2']);
    return $response->withJson($val);
});

$app->post('/subtract', function($request, $response){
   $parsedBody = $request->getParsedBody();
   $num1 = $parsedBody['num1'];
   $num2 = $parsedBody['num2'];

   $test  = new TestController();
   $val = $test->subtract($num1, $num2);
   return $response->withJson($val);
});

$app->post('/multiply', function($request, $response){
    $parsedBody = $request->getParsedBody();
    $num1 = $parsedBody['num1'];
    $num2 = $parsedBody['num2'];

    $test = new TestController();
    $val = $test->multiply($num1, $num2);
    return $response->withJson($val);
});


$app->post('/divide', function($request, $response) {
    $parsedBody = $request->getParsedBody();
    $num1 = $parsedBody['num1'];
    $num2 = $parsedBody['num2'];

    $test = new TestController();
    $val = $test->divide($num1, $num2);
    return $response->withJson($val);
});

$app->post('/mod', function($request, $response) {
    $parsedBody = $request->getParsedBody();
    $num1 = $parsedBody['num1'];
    $num2 = $parsedBody['num2'];
    $test = new TestController();
    $val = $test->modulo($num1, $num2);
    return $response->withJson($val);
});


// Run app
$app->run();