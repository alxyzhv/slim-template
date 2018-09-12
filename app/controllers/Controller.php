<?php

namespace app\controllers;

use Slim\Http\Response;

class Controller
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function render(Response $response, string $template, array $vars = null)
    {
        return $this->view->render($response, $template . '.phtml', $vars);
    }

    public function __get($name)
    {
        if ($this->container->{$name}) {
            return $this->container->{$name};
        }
        return $name;
    }
}
