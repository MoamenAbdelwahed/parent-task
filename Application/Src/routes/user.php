<?php

use Application\Src\Http\Controllers\UserController;

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/', [UserController::class, 'index']);
});
