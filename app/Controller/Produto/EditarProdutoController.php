<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto\ProdutoModel;

class EditarProdutoController extends AbstractController
{
    private ProdutoModel $model;

    public function __construct()
    {
        $this->model = new ProdutoModel();
    }

    public function index(array $requestData): void
    {
        $id = filter_var($requestData['id'] ?? null, FILTER_VALIDATE_INT);

        if ($id === false || $id < 1) {
            $this->redirectToError('ID de produto inválido.');
        }

        $produto = $this->model->buscarPorId($id);

        if ($produto === null) {
            $this->redirectToError('Produto não encontrado.');
        }

        $this->render('produto/editar_produto.php', [
            'produto' => $produto,
        ]);
    }
}