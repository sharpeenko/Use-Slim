<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // Это надо будет из .env
        'addContentLengthHeader' => false, // Это надо будет из .env
        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => Monolog\Logger::DEBUG,
        ],
    ],
];
