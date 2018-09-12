<?php

use app\controllers\HelloController;

/** @var \Slim\App $app */
$app->get('/hello', HelloController::class . ':index');
$app->add(\app\middleware\ExampleMiddleware::class);
