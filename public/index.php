<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require '../vendor/autoload.php';

// Настройки
require __DIR__ . '/../env.php';


// Instantiate the app
$settings = require __DIR__ . '/../config/settings.php';
$app = new Slim\App($settings);

$app->get('/hello', function (Request $request, Response $response) {
    $name = $_ENV['APP_ENV'];
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->run();
