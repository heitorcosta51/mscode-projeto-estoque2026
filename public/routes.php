<?php

use App\Controller\AppController;
use App\Controller\Error\ErrorController;
use App\Controller\Categoria\CategoriaController;
use App\Controller\Error\NotFoundController;
use App\Controller\Home\HomeController;
use App\Controller\Login\LoginController;
use App\Controller\Categoria\NovaCategoriaController;
use App\Controller\Produto\ExcluirProdutoController;
use App\Controller\Categoria\CadastrarCategoriaController;
use App\Controller\Categoria\EditarCategoriaController;
use App\Controller\Categoria\AtualizarCategoriaController;
use App\Controller\Categoria\ExcluirCategoriaController;
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
        '/editar_categoria' => EditarCategoriaController::class,
        '/atualizar_categoria' => AtualizarCategoriaController::class,
        '/excluir_categoria' => ExcluirCategoriaController::class,

        '/produtos' => ProdutoController::class,
        '/novo_produto' => NovoProdutoController::class,
        '/cadastrar_produto' => CadastrarProdutoController::class,
        '/editar_produto' => EditarProdutoController::class,
        '/atualizar_produto' => AtualizarProdutoController::class,
        '/excluir_produto' => ExcluirProdutoController::class,
    ],
    'default' => NotFoundController::class
];