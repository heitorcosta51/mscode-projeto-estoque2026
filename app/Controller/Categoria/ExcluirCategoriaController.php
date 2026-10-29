<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;

class ExcluirCategoriaController extends AbstractController
{
    private CategoriaModel $model;

    public function __construct()
    {
        $this->model = new CategoriaModel();
    }

    public function index(array $requestData): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
            $this->redirectToError('Método de requisição inválido');
        }

        $id = filter_var($requestData['id'] ?? null, FILTER_VALIDATE_INT);

        if ($id === false || $id < 1) {
            $this->redirectToError('ID de categoria inválido');
        }

        try {
            $this->model->excluir($id);
            $this->redirect('/categorias');
        } catch (\RuntimeException $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}
