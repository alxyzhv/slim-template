<?php

namespace app\middleware;

use Slim\Http\Request;
use Slim\Http\Response;

class ExampleMiddleware extends Middleware
{
    public function __invoke(Request $request, Response $response, Callable $next)
    {
        /** @var Response $response */
        $response = $next($request, $response);
        return $response->withHeader('middleware', 'works');
    }
}
