<?php

use App\controllers\TestController;

$app = new \Slim\App();


$app->post('/doCalculations', function($request, $response){
    $parsedBody = $request->getParsedBody();
    $calculate = new TestController();
    $operation = $parsedBody['operation'];
    $num1 = $parsedBody['num1'];
    $num2 = $parsedBody['num2'];

    if(!$operation) {
        return $response->withStatus(404)->withJson(["error" => "Please Provide calculation operation"]);
    }
    if($operation === 'add') {
        $val = $calculate->addNum($num1, $num2);
    }
    if($operation === 'subtract') {
        $val = $calculate->subtract($num1, $num2);
    }
    if($operation === 'multiply') {
        $val = $calculate->multiply($num1, $num2);
    }
    if($operation === 'divide') {
        $val = $calculate->divide($num1, $num2);
    }
    if($operation === 'mod') {
        $val = $calculate->modulo($num1, $num2);
    }



    return $response->withStatus(200)->withJson($val);



});

$app->run();
