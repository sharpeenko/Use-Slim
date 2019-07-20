<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require '../vendor/autoload.php';

// Настройки
require __DIR__ . '/../env.php';


// Instantiate the app
$settings = require __DIR__ . '/../config/settings.php';
$app = new Slim\App($settings);

$app->add(function ($request, $response, $next) {
    $response->getBody()->write('BEFORE');
    $response = $next($request, $response);
    $response->getBody()->write('AFTER');

    return $response;
});

$wm = function ($request, $response, $next) {
    $response->getBody()->write('BEFORE ROUTE');
    $response = $next($request, $response);
    $response->getBody()->write('AFTER ROUTE');

    return $response;
};

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
})->add($wm);
$app->run();
