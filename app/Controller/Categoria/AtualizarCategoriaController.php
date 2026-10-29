<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;

class AtualizarCategoriaController extends AbstractController
{
    private CategoriaModel $model;

    public function __construct()
    {
        $this->model = new CategoriaModel();
    }

    public function index(array $requestData): void
    {
        try {
            $id = filter_var($requestData['id'] ?? null, FILTER_VALIDATE_INT);
            $nome = $requestData['nome'] ?? null;

            if ($id === false || $id < 1) {
                throw new \Exception('ID de categoria inválido');
            }
            if (!is_string($nome) || trim($nome) === '' || strlen(trim($nome)) > 50) {
                throw new \Exception('Informe um nome de categoria com até 50 caracteres');
            }

            $this->model->atualizar($id, trim($nome));

            $this->redirect('/categorias');
        } catch (\Exception $e) {
            $this->redirectToError($e->getMessage());
        }
    }
}
