<?php

use App\Controller\AppController;
use App\Controller\Error\ErrorController;
use App\Controller\Categoria\CategoriaController;
use App\Controller\Error\NotFoundController;
use App\Controller\Home\HomeController;
use App\Controller\Login\LoginController;
use App\Controller\Categoria\NovaCategoriaController;
use App\Controller\Categoria\CadastrarCategoriaController;
use App\Controller\Produto\ProdutoController;
use App\Controller\Produto\EditarProdutoController;
use App\Controller\Produto\AtualizarProdutoController;
use App\Controller\Produto\NovoProdutoController;
use App\Controller\Produto\CadastrarProdutoController;

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

        '/produtos' => ProdutoController::class,
        '/novo_produto' => NovoProdutoController::class,
        '/cadastrar_produto' => CadastrarProdutoController::class,
        '/editar_produto' => EditarProdutoController::class,
        '/atualizar_produto' => AtualizarProdutoController::class,
    ],
    'default' => NotFoundController::class
];