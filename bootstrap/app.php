<?php

use Dotenv\Dotenv;
use Illuminate\Database\Capsule\Manager;
use Slim\Views\PhpRenderer;

session_start();

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv(__DIR__ . '/..');
$dotenv->load();

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => getenv('DISPLAY_ERRORS'),
        'debug' => getenv('DEBUG')
    ]
]);

$container = $app->getContainer();

$container['view'] = new PhpRenderer(__DIR__ . '/../resources/templates');

$capsule = new Manager();
$capsule->addConnection([
    'driver' => getenv('DB_DRIVER'),
    'host' => getenv('DB_HOST'),
    'database' => getenv('DB_DATABASE'),
    'username' => getenv('DB_USERNAME'),
    'password' => getenv('DB_PASSWORD'),
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function () use ($capsule) {
    return $capsule;
};

require __DIR__ . '/../app/routes.php';
