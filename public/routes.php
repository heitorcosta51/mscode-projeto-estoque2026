<?php

use App\Controller\AppController;
use App\Controller\Error\ErrorController;
use App\Controller\Categoria\CategoriaController;
use App\Controller\Error\NotFoundController;
use App\Controller\Home\HomeController;
use App\Controller\Login\LoginController;
use App\Controller\Categoria\NovaCategoriaController;
use App\Controller\Categoria\CadastrarCategoriaController;

$router = [
    'routes' => [
        '/' => AppController::class,
        '/error' => ErrorController::class,
        '/login' => LoginController::class,
        '/home' => HomeController::class,

        '/categoria' => CategoriaController::class,
        '/categorias' => CategoriaController::class,
        '/nova_categoria' => NovaCategoriaController::class,
        '/cadastrar_categoria' => CadastrarCategoriaController::class,
    ],
    'default' => NotFoundController::class
];