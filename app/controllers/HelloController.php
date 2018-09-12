<?php

namespace app\controllers;

use app\models\User;
use Slim\Http\Request;
use Slim\Http\Response;

class HelloController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $name = $request->getParam('name') ?? 'user';
        $user = new User();
        $user->name = $name;
        $user->setPassword('123456');
        $user->save();
        return $this->render($response, 'hello', [
            'name' => $name
        ]);
    }
}
