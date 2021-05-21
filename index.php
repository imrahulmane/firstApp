<?php

require  getcwd() . '/vendor/autoload.php';

$requestUri = str_replace('firstApp/api/', '', $_SERVER['REQUEST_URI']);
$requestUri = explode('/', $requestUri);
$file = $requestUri[1];
unset($requestUri[1]);
$requestUri = array_values($requestUri);
$requestUri = implode('/',$requestUri);
$_SERVER['REQUEST_URI'] = $requestUri;

require getcwd() . '/app/api/' . $file . '.php';