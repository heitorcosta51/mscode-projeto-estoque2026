<?php

namespace App\Controller\Categoria;

use App\Controller\AbstractController;
use App\Model\Categoria\CategoriaModel;

class EditarCategoriaController extends AbstractController
{
    private CategoriaModel $model;

    public function __construct()
    {
        $this->model = new CategoriaModel();
    }

    public function index(array $requestData): void
    {
        $id = filter_var($requestData['id'] ?? null, FILTER_VALIDATE_INT);

        if ($id === false || $id < 1) {
            $this->redirectToError('ID de categoria inválido');
        }

        $categoria = $this->model->buscarPorId($id);

        if ($categoria === null) {
            $this->redirectToError('Categoria não encontrada');
        }

        $this->render('categoria/editar_categoria.php', [
            'categoria' => $categoria,
        ]);
    }
}
