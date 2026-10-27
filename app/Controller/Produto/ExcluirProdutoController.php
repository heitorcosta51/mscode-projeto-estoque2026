<?php

namespace App\Controller\Produto;

use App\Controller\AbstractController;
use App\Model\Produto\ProdutoModel;

class ExcluirProdutoController extends AbstractController
{
    private ProdutoModel $model;

    public function __construct()
    {
        $this->model = new ProdutoModel();
    }

    public function index(array $requestData): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            $this->redirectToError('Método de requisição inválido.');
        }

        $id = filter_var($requestData['id'] ?? null, FILTER_VALIDATE_INT);

        if ($id === false || $id < 1) {
            $this->redirectToError('ID de produto inválido.');
        }

        try {
            $this->model->excluir($id);
            $this->redirect('/produtos');
        } catch (\RuntimeException $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}